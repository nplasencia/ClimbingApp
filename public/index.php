<?php

declare(strict_types=1);

use Nplasencia\ClimbingApp\Controllers\ClimbingPlacesController;

require '../vendor/autoload.php';

$controller = new ClimbingPlacesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST);
}

$controller->index();
