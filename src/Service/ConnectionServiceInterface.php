<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Service;

interface ConnectionServiceInterface
{
    public function getData(): string;
    public function saveData(string $jsonString): bool;
}