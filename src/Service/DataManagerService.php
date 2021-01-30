<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Service;

use JsonException;
use Nplasencia\ClimbingApp\Model\ClimbingPlace;
use Nplasencia\ClimbingApp\Utils\JsonUtils;

final class DataManagerService implements DataManagerServiceInterface
{
    private ConnectionServiceInterface $connection;
    private JsonUtils $jsonUtils;

    public function __construct(ConnectionServiceInterface $connection)
    {
        $this->connection = $connection;
        $this->jsonUtils = new JsonUtils();
    }

    /**
     * @return ClimbingPlace[]
     * @throws JsonException
     */
    public function getClimbingPlaces(): array
    {
        $climbingPlacesJsonString = $this->connection->getData();
        $objects = $this->jsonUtils->jsonDecodeThrowsOnError($climbingPlacesJsonString);

        return array_map(function ($object){
            return ClimbingPlace::createFromJsonObject($object);
        }, $objects);
    }

    /**
     * @param ClimbingPlace $climbingPlace
     * @return bool
     * @throws JsonException
     */
    public function storeClimbingPlace(ClimbingPlace $climbingPlace): bool
    {
        $climbingPlaceJsonString = $this->jsonUtils->jsonEncodeThrowsOnError($climbingPlace);
        return $this->connection->saveData($climbingPlaceJsonString);
    }
}