<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
    ],
];
