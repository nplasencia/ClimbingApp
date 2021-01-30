<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Service;

final class ConnectionFilesystemService implements ConnectionServiceInterface
{
    private const CLIMBING_PLACES_FILE = '/var/www/html/resources/data/climbingPlaces.json';

    public function getData(): string
    {
        return file_get_contents(self::CLIMBING_PLACES_FILE);
    }

    public function saveData(string $jsonString): bool
    {
        $dataToWrite = $this->generateDataToWrite($jsonString);
        return (bool) file_put_contents(self::CLIMBING_PLACES_FILE, $dataToWrite, LOCK_EX);
    }

    private function generateDataToWrite(string $jsonString): string
    {
        $existingData = file_get_contents(self::CLIMBING_PLACES_FILE);
        if (empty($existingData)) {
            return '['.$jsonString.']';
        }

        return substr($existingData, 0, -1) . ',' . $jsonString . ']';
    }
}