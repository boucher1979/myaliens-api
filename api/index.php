<?php

require '../app/bootstrap.php';

echo 'This is the root index file';

class RootController extends App\common\Controller
{
    function __construct()
    {
        parent::__construct();
        $this->log->info('Root controller instantiated');
    }   
    // TODO
}

$controller = new RootController();
?>