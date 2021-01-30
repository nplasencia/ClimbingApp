<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Model;

use JsonSerializable;
use stdClass;

final class ClimbingPlace extends stdClass implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $country;

    public function __construct(int $id, string $name, string $country)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
    }

    public static function createFromJsonObject(stdClass $object): ClimbingPlace
    {
        return new ClimbingPlace($object->id, $object->name, $object->country);
    }

    public static function createFromPostData(array $postData): ClimbingPlace
    {
        return new ClimbingPlace((int) $postData['id'], $postData['name'], $postData['country']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function __toString(): string
    {
        $template = 'Climbing place [%s] from [%s] with id [%d]';
        return sprintf($template, $this->name, $this->country, $this->id);
    }

    public function jsonSerialize(): array
    {
        $array = [];

        $properties = get_object_vars($this);
        foreach ($properties as $propertyName => $propertyValue) {
            $array[$propertyName] = $propertyValue;
        }

        return $array;
    }
}