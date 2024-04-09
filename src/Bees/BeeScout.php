<?php

// Include the Bee class
require_once 'Bee.php';

class BeeScout extends Bee {

    public function __construct()
    {
        $this->type = "Scout";
        $this->hitPoints = 30;
        $this->damage = 15;
    }

}