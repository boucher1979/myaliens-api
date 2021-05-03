<?php

namespace App\common;

use Dotenv\Dotenv;

class Base
{
    private $dotenv;

    function __construct()
    {
        $this->dotenv = Dotenv::createImmutable(dirname(__DIR__).'../../');
        $this->dotenv->load(); 
    }
}

?>