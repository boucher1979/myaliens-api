<?php

namespace App\Services;
use App\Common\Db;
use Monolog\Logger;

class Alien
{
    protected $dbCon = null;
    protected $log = null;
    
    function __construct(Db $_dbCon, Logger $_logger)
    {
        $this->dbCon = $_dbCon;
        $this->log = $_logger;
    }

    public function GetAlien(int $id) : Array
    {
        try
        {
            $sql = "SELECT * FROM alien WHERE id = :id";
            $params = array("id"=> $id);
            $result = $this->dbCon->GetRow($sql,$params);

            if ($result == null)
            {
                $result = array();
            }

            return $result;
        }
        catch(Exception $e)
        {
            $this->log->warning(__FUNCTION__ . ': ' . $e->getMessage());
        }
        
    }
}
?>