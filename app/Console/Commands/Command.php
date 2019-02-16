<?php

namespace App\Console\Commands;

use Illuminate\Console\Command as BaseCommand;
use App\Libraries\MQ\AMQP;

class Command extends BaseCommand
{
    protected $signature   = 'command';

    protected $description = 'Command基类';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

    }


    public function line($string, $style = null, $verbosity = null)
    {
        $string = date('[Y-m-d H:i:s]') . " " . $string;
        return parent::line($string, $style, $verbosity);
    }

}