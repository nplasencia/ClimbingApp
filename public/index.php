<?php

declare(strict_types=1);

use Nplasencia\ClimbingApp\Controllers\ClimbingPlacesController;

require '../vendor/autoload.php';

$controller = new ClimbingPlacesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = json_decode(file_get_contents('php://input'), true);
    $controller->store($response);
}

$controller->index();
