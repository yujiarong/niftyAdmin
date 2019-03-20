<?php

namespace App\Console\Commands;

use App\Libraries\MQ\AMQP;

class Test extends Command
{
    protected $signature   = 'test {func}';

    protected $description = 'Command test 类';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $func = $this->argument('func');
        $this->{$func}();

    }

    public function batchGet(){
        $queue = 'SYN_EBAY_LISTING_QUEUE';
        $amqp  = new AMQP('marketing');
        $data  = $amqp->batchGet($queue,50);
        dd($data);
    }

    public function consume(){
        $queue = 'SYN_EBAY_LISTING_QUEUE';
        $msg   = '3123131231231';
        $amqp  = new AMQP('marketing');
        $amqp->setQos(1);
        $amqp->basicConsume($queue, [$this, 'process'],true );        
    }

    public function publish(){
        $queue = 'SYN_EBAY_LISTING_QUEUE';
        $exchange = 'SYN_LISTING_EXCHANGE';
        $msg   = '3123131231231';
        $amqp  = new AMQP('marketing');
        $msg   = range(0, 100);
        $amqp->batchPublish($msg, $exchange,'ebay');
    }



    public function process($msg){
        $info  = $msg->body;
        $this->line($info);
        // return ['ack'=>true];
    }

}