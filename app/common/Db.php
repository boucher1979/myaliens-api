<?php

namespace App\common;

class Db
{
    private $db;

    function __construct($dbname, $user, $password)
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=' . $dbname, $user, $password);
    }

    function PrepareCall(string $sql)
    {
        // Expose this to allow maximum flexibilty for the out of the ordinary
        return $this->db->prepare($sql);
    }

    function GetAllRows(string $sql, array $params): Array
    {
        $call = $this->db->prepare($sql);
        foreach($params as $key => $value)
        {
            $call->bindValue(':'.$key, $value);
        }

        $call->execute();
        $callResult = $call->fetchAll();

        if ($callResult == null)
        {
            $callResult = array();
        }

        return $callResult;
    }

    function GetRow(string $sql, array $params): Array
    {
        $call = $this->db->prepare($sql);
        foreach($params as $key => $value)
        {
            $call->bindValue(':'.$key, $value);
        }

        $call->execute();
        $callResult = $call->fetch();

        if ($callResult == null)
        {
            $callResult = array();
        }

        return $callResult;
    }
}

?>