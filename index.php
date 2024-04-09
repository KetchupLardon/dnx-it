<?php
require_once 'src/Controller.php';


session_start();
$controllerClass = new Controller;
$nbWorker = 5;
$nbScout = 8;

if (!isset($_SESSION['bees'])) {
    $bees = $controllerClass->buildBeeHive($nbWorker, $nbScout);
    $_SESSION['bees'] = $bees;
} else {
    $bees = $_SESSION['bees'];
}

if(!empty($_POST)){
    $controllerClass->hit($bees);
    $controllerClass->reset($nbWorker, $nbScout);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>
<h2>Bees</h2>
<table>
    <tr>
        <th>Type</th>
        <th>Hit Points</th>
        <th>Damage</th>
    </tr>
    <?php foreach ($bees as $bee): ?>
        <tr>
            <td><?= $bee->type; ?></td>
            <td><?= $bee->hitPoints; ?></td>
            <td><?= $bee->damage; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="post" action="">
    <button type="submit" name="hit">Hit</button>
    <button type="submit" name="reset">Reset</button>
</form>
