<?php
namespace App\common;
class ApiDb extends Db
{
    function __construct()
    {
        parent::__construct('aliens','api_user','api_password');
    }
}


?>