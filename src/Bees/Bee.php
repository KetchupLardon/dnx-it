<?php

abstract class Bee
{
    public $type;
    public $hitPoints;
    public $damage;

    public function takeHit()
    {
        $this->hitPoints -= $this->damage;
        if ($this->hitPoints <= 0) {
            $this->hitPoints = 0;
        }
    }

    public function isAlive()
    {
        return $this->hitPoints > 0;
    }

    public function isDead()
    {
        return !$this->isAlive();
    }

    public function kill()
    {
        $this->hitPoints = 0;
    }

}
?>
