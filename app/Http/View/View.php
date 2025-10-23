<?php

namespace View;

class View
{
    public static function render(string $template, array $params = []): void
    {
        extract($params);

        $viewsDirPath = str_replace('/Http/View', '', __DIR__);

        $file = $viewsDirPath . '/views/' . $template . '.php';

        if (!file_exists($file)) {
            throw new \RuntimeException("View not found: $file");
        }

        include $file;
    }
}