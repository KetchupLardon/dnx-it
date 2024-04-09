<?php

// Include the Bee class
require_once 'Bee.php';

class BeeWorker extends Bee {

    public function __construct()
    {
        $this->type = "Worker";
        $this->hitPoints = 50;
        $this->damage = 20;
    }

}