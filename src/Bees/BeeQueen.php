<?php

// Include the Bee class
require_once 'Bee.php';

class BeeQueen extends Bee {

    public function __construct()
    {
        $this->type = "Queen";
        $this->hitPoints = 100;
        $this->damage = 15;
    }

}