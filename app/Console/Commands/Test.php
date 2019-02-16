<?php

namespace App\Console\Commands;

use App\Libraries\MQ\AMQP;

class Test extends Command
{
    protected $signature   = 'test';

    protected $description = 'Command test 类';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$queue = 'SYN_EBAY_LISTING_QUEUE';
    	$msg   = '3123131231231';
    	$amqp  = new AMQP('marketing');
        $amqp->setQos(1);
    	$amqp->basicConsume($queue, [$this, 'process'],true );

    }

    public publish(){
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