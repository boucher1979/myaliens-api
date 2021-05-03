<?php
namespace App\common;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Controller 
{
    protected $log;

    function __construct()
    {
        $this->InitiateLogging();
    }

    private function InitiateLogging()
    {
        $this->log = new Logger('controller');
        $this->log->pushHandler(new StreamHandler('D:/myaliens/logs/api.log', Logger::WARNING));
        $this->log->pushHandler(new StreamHandler('D:/myaliens/logs/api.log', Logger::INFO));
    }
}
?>