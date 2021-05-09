<?php
namespace App\common;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Controller extends Base
{
    protected $log;

    function __construct()
    {
        parent::__construct();
        $this->InitiateLogging();
    }

    private function InitiateLogging()
    {
        $this->log = new Logger('controller');
        $this->log->pushHandler(new StreamHandler($_ENV['APILOG_PATH'], Logger::WARNING));
        $this->log->pushHandler(new StreamHandler($_ENV['APILOG_PATH'], Logger::INFO));
    }

    function GetLog()
    {
        return $this->log;
    }
}
?>