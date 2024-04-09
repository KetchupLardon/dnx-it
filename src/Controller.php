<?php 

require_once 'Bees/Bee.php';
require_once 'Bees/BeeWorker.php';
require_once 'Bees/BeeQueen.php';
require_once 'Bees/BeeScout.php';

class Controller {


    public function buildBeeHive($nbWorker, $nbScout)
    {
        $bees[] = new BeeQueen();
        for ($i = 0; $i < $nbWorker; $i++) {
            $bees[] = new BeeWorker();
        }
         for ($j = 0; $j < $nbScout; $j++) {
            $bees[] = new BeeScout();
        }

        return $bees;

    }

    public function hit($bees) 
    {
        // Check for form submission (hit button pressed)
        if (isset($_POST['hit'])) {

            // Select a random live bee
            $liveBees = array_filter($bees, function ($bee) {
                return $bee->isAlive();
            });

            if (!empty($liveBees)) {
                $randomBeeIndex = array_rand($liveBees, 1);
                $liveBees[$randomBeeIndex]->takeHit();

                // Check if Queen is dead
                if ($bees[0]->isDead()) {
                    // Kill all other bees
                    foreach ($bees as $bee) {
                        $bee->kill();
                    }
                }
                $_SESSION['bees'] = $bees; 
            }
        }
    }

    public function reset($nbWorker, $nbScout) 
    {
        if (isset($_POST['reset'])) {
            $_SESSION['bees'] = $this->buildBeeHive($nbWorker, $nbScout);
        }
    }
}