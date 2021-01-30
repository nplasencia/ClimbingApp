<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Controllers;

use JsonException;
use Nplasencia\ClimbingApp\Model\ClimbingPlace;
use Nplasencia\ClimbingApp\Service\ConnectionFilesystemService;
use Nplasencia\ClimbingApp\Service\DataManagerService;

final class ClimbingPlacesController
{
    private DataManagerService $dataService;
    private ViewController $viewController;

    public function __construct()
    {
        $this->dataService = new DataManagerService(new ConnectionFilesystemService());
        $this->viewController = new ViewController();
    }

    public function index(): void
    {
        $climbingPlaces = $this->tryGetClimbingPlaces();
        $total = count($climbingPlaces);
        $this->viewController->render('default', ['climbingPlaces' => $climbingPlaces, 'total' => $total]);
    }

    public function store(array $postData): void
    {
        $place = ClimbingPlace::createFromPostData($postData);
        $this->dataService->storeClimbingPlace($place);
    }

    private function tryGetClimbingPlaces(): array
    {
        try {
            return $this->dataService->getClimbingPlaces();
        } catch (JsonException $jsonException) {
            // TODO: Log error
            return [];
        }
    }
}