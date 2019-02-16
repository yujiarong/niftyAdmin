<?php
/*
 * rabbitMQ封装
 */
namespace App\Libraries\MQ;

// define('AMQP_PASSIVE', true);
// define('AMQP_DEBUG', false);
use App\Exceptions\AMQPException;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class AMQP{

    private $channel;
    private $msg;
    private $conn;
    private $system;
    private $consumer_tag;
    private $isRePublish = false;
    private $mid;
    private $callback;
    private $config_path = 'queue.RMQ_CONFIG';

    public function __construct($system = ''){
        if(!empty($system)){
            $this->connection($system);
        }
    }

    public function __destruct(){
        $this->closeConnection();
    }

    /**
     * 实例化后rabbitMQ连接
     * @param string $system 系统名称
     * @return bool
     */
    public function connection($system){;
        if(empty($this->conn)){
            return $this->resetConnection($system);
        }
        if($system != $this->system){
            return $this->resetConnection($system);
        }
        return true;
    }

    /**
     * 强制重置rabbitMQ连接
     * @param string $system 系统名称
     * @return bool
     */
    public function resetConnection($system){
        $rmqconfig = config($this->config_path);
        if(isset($rmqconfig[$system])){
            $this->closeConnection();
            list($host, $user, $password, $port, $vhost) = $rmqconfig[$system];
            $this->conn         = new AMQPConnection($host, $port, $user, $password, $vhost );
            if(!$this->conn->isConnected()){
                throw new AMQPException($system.'链接失败');
            }
            $this->consumer_tag = getNow().':'.getmypid();
            $this->channel      = $this->conn->channel();
            $this->system       = $system;
            //			$this->ackHandler();
            return true;
        }else{
            throw new AMQPException('systme 没有配置');
        }
    }

    /*
     * 设置消息体大小限制
     * @param string|int $bytes 字节数
     */
    private function setBodySizeLimit($bytes=0){
        $this->channel->setBodySizeLimit($bytes);
    }

    /*
     * 添加交换器
     * @param string $ename 交换器名称
     * @param string $type 交换器的消息传递方式 可选:'fanout','direct','topic','headers'
     * 'fanout':不处理(忽略)路由键，将消息广播给绑定到该交换机的所有队列
     * 'diect':处理路由键，对路由键进行全文匹配。对于路由键为"xzy_rain"的消息只会分发给路由键绑定为"xzy_rain"的队列,不会分发给路由键绑定为"xzy_music"的队列
     * 'topic':处理路由键，按模式匹配路由键。模式符号 "#" 表示一个或多个单词，"*" 仅匹配一个单词。如 "xzy.#" 可匹配 "xzy.rain.music"，但 "xzy.*" 只匹配 "xzy.rain"和"xzy.music"。只能用"."进行连接，键长度不超过255字节
     * @param boolean $durable 是否持久化
     * @param boolean $auto_delete 当所有绑定队列都不再使用时，是否自动删除该交换机
     */
    public function addExchange($ename, $type = 'fanout', $durable = true, $auto_delete = false){
        $this->channel->exchange_declare($ename, $type, false, $durable, $auto_delete);
    }

    /*
     * 添加队列
     * @param string $qname 队列名称
     * @param boolean $durable 是否持久化
     * @param boolean $exclusive 仅创建者可以使用的私有队列，断开后自动删除
     * @param boolean $auto_delete 当所有消费客户端连接断开后，是否自动删除队列
     * return int 该队列的ready消息数量
     */
    public function addQueue($qname, $durable = true, $exclusive = false, $auto_delete = false){
        $this->channel->queue_declare($qname, false, $durable, $exclusive, $auto_delete);
    }

    /*
     * 绑定队列和交换器
     * @param string $qname 队列名称
     * @param string $ename 交换器名称
     * @param string $routing_key 路由键 注:在fanout的交换器中路由键会被忽略
     * @author xzy
     */
    public function bind($qname, $ename, $routing_key = ''){
        $this->channel->queue_bind($qname, $ename, $routing_key);
    }

    /*
     * 设置消费者预取消息数量
     * @param string|int $count 预取消息数量
     */
    public function setQos($count = 1){
        $this->channel->basic_qos(null, $count, null);
    }

    /**
     * 基础模型之消息发布
     * @param string $exchange 交换器名称
     * @param string|array $msg 发布内容
     * @param string $mqtype 发布消息的类型
     * @return bool
     */
    public function basicPublish($msg, $exchang,$routing_key=''){
        if(is_array($msg))$msg = json_encode($msg);
        $message  = new AMQPMessage( $msg,array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT) );
        $this->channel->basic_publish($message, $exchang,$routing_key);
        $this->publishLog($exchange,$routing_key,1);
    }

    /**
     * confirm  pushlish
     * @param string $exchange 交换器名称
     * @param string|array $msg 发布内容
     * @param string $mqtype 发布消息的类型
     * @return bool
     */
    public function ackPublish($msg, $exchang,$routing_key=''){
        $this->ackHandler();
        $this->basicPublish($msg, $exchang,$routing_key);
        $this->waitAck();
        $this->publishLog($exchange,$routing_key,1);
    }

    /**
     * 批量发布
     * @param array $exchange 交换器名称
     * @param string|array $msg 发布内容
     * @param string $routing_key 路由
     */
    public function batchPublish($msg,$exchange,$routing_key=''){
        if(!is_array($msg)){
            throw new AMQPException("批量推送msg必须要为数组");
        }
        foreach ($msg as  $v) {
            if(is_array($v))$v = json_encode($v);
            $message = new AMQPMessage($v, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
            $this->channel->batch_basic_publish($message,$exchange,$routing_key);
        }
        $this->channel->publish_batch();
        $this->publishLog($exchange,$routing_key,count($msg));
    }

    /**
     * 基础模型之消息接受
     * @param string $exchange
     * @param string $queue
     * @param array $callback
     * @param string $mqtype
     * @return string
     */

    public function basicConsume($queue , $callback, $no_ack = false){
        $this->callback = $callback;
        $this->channel->basic_consume($queue, $this->consumer_tag, false, $no_ack, false, false, [$this,'process_message']);
/*        while(count($this->ch->callbacks)){
            $this->channel->wait();
        }*/
        while (count($this->channel->callbacks)) {
        	$read   = array($this->conn->getSocket()); // add here other sockets that you need to attend
        	$write  = null;
        	$except = null;
        	if (false == ($num_changed_streams = stream_select($read, $write, $except, 60))) {
                throw new AMQPException("队列接受异常或队列消息为空");
        	} elseif ($num_changed_streams > 0) {
        		$this->channel->wait();
        	}
        }
        
    }



    /**
     * Pub/Sub 之批量消息接受，默认接受200条数据
     * @param string $exchange 交换器名称
     * @param string $queue 队列名称
     * @param int $limit 返回条数
     * @param bool $extral 返回数据类型， true为json_decode， false为json
     * @return array
     */
    public function queueSubscribeLimit($exchange, $queue, $limit = 200, $extral = true, $mqtype = 'fanout'){

        $messageCount = $this->channel->queue_declare($queue, false, true, false, false);
        $this->channel->queue_bind($queue, $exchange);
        $i        = 0;
        $max      = $limit < 200 ? $limit : 200;
        $orderids = array();
        while($i < $messageCount[1] && $i < $max){
            $this->msg = $this->channel->basic_get($queue);
            $this->channel->basic_ack($this->msg->delivery_info['delivery_tag']);
            if($extral === false){
                array_push($orderids, $this->msg->body);
            }else{
                array_push($orderids, json_decode($this->msg->body, true));
            }
            $i++;
        }

        return $orderids;
    }

    /**
     * 重推消息
     * @param string|int $mid 重推消息id
     * @param string $exchange 交换器名称
     * @param string|array $msg 发布内容
     * @param string $routing_key 路由键 注:在fanout的交换器中路由键会被忽略
     * @return bool
     */

    public function rePublish($mid,$exchange, $msg, $routing_key=''){
        $this->isRePublish = true;
        $this->mid = $mid;
        $msg = is_array($msg) ? json_encode($msg) : $msg;
        $tosend = new AMQPMessage($msg, array('content_type' => 'text/plain', 'delivery_mode' => 2));
        $this->channel->basic_publish($tosend, $exchange, $routing_key);
        $this->waitAck();
        $this->isRePublish = false;//为了防止之后调用其他推送方法出现异常
    }

    /**
     * 销毁队列中的数据
     * @param $msg_obj
     * @return bool
     */
    public function basicAck($msg_obj){
        $this->channel->basic_ack($msg_obj->delivery_info['delivery_tag']);
    }


    /**
     * 推送回调处理
     */
    public function ackHandler(){
        $this->channel->set_ack_handler(
            function (AMQPMessage $message) {
                echo "Message acked with content " . $message->body . PHP_EOL;
            }
        );
        $this->channel->set_nack_handler(
            function (AMQPMessage $message) {
                echo "Message nacked with content " . $message->body . PHP_EOL;
            }
        );
        $this->channel->confirm_select();
    }

    public function waitAck(){
        $this->channel->wait_for_pending_acks();
    }


    /**
     * 默认回调函数
     * @param object $msg_obj
     * @return bool
     */
    public function process_message($msg_obj){
        $rerult = call_user_func($this->callback,$msg_obj);
        if(($rerult['ack'])){
            $this->basicAck($msg_obj);
        }
    }

    /**
     * 关闭消费者
     * @param $msg_obj
     * @return array
     */
    public function cancelConsumer($msg_obj){
        $msg_obj->delivery_info['channel']->basic_cancel($msg_obj->delivery_info['consumer_tag']);
    }

    public function closeConnection(){
        if(is_object($this->channel)){
            $this->channel->close();
        }
        if(is_object($this->conn)){
            $this->conn->close();
        }        
    }

    public function publishLog($exchange,$route,$count){
        echo getNow()."[交换机:{$exchange}][路由:{$route}][数量:$count]".PHP_EOL;
    }


}
