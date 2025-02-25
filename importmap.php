<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    'bootstrap' => [
        'version' => '5.3.3',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    'bootstrap/dist/css/bootstrap.min.css' => [
        'version' => '5.3.3',
        'type' => 'css',
    ],
    'bootstrap/dist/js/bootstrap.bundle.min.js' => [
        'version' => '5.3.3',
        'type' => 'css',
    ],
    'diaporama' => [
        'path' => './assets/js/diaporama.js',
        'entrypoint' => true,
    ],
    'contact' => [
        'path' => './assets/css/contact.css',
        'type' => 'css',
        'entrypoint' => true,
    ],
    'homepage' => [
        'path' => './assets/css/homepage.css',
        'type' => 'css',
        'entrypoint' => true,
    ],
    'houseAll' => [
        'path' => './assets/css/houseAll.css',
        'type' => 'css',
        'entrypoint' => true,
    ],
    'housePage' => [
        'path' => './assets/css/housePage.css',
        'type' => 'css',
        'entrypoint' => true,
    ],
    'style.css' => [
        'path' => './assets/styles/app.css',
        'type' => 'css',
        'entrypoint' => true,
    ],
];
