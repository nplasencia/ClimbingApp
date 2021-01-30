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

    /**
     * @throws JsonException
     */
    public function index(): void
    {
        $climbingPlaces = $this->dataService->getClimbingPlaces();
        $this->viewController->render(
            'default',
            ['climbingPlaces' => $climbingPlaces, 'total' => count($climbingPlaces)]
        );
    }

    /**
     * @param array $postData
     * @throws JsonException
     */
    public function store(array $postData): void
    {
        $place = ClimbingPlace::createFromPostData($postData);
        $this->dataService->storeClimbingPlace($place);
    }
}