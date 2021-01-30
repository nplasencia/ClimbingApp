<?php

declare(strict_types=1);

namespace Nplasencia\ClimbingApp\Controllers;

final class ViewController
{
    private const LAYOUTS_ABSOLUTE_PATH = '/var/www/html/views/layouts/';

    public function render(string $layoutName = 'default', array $vars = []): void
    {
        foreach ($vars as $key => $value) {
            ${$key} = $value;
        }

        include($this->getLayoutAbsolutePath($layoutName));
    }

    private function getLayoutAbsolutePath(string $layoutName): string
    {
        return self::LAYOUTS_ABSOLUTE_PATH . $layoutName . '.php';
    }
}