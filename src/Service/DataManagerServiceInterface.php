<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Service;

use Nplasencia\ClimbingApp\Model\ClimbingPlace;

interface DataManagerServiceInterface
{
    public function getClimbingPlaces(): array;
    public function storeClimbingPlace(ClimbingPlace $climbingPlace): bool;
}