# mapbox-token
PHP client for Mapbox Token API

[![Build Status](https://travis-ci.org/assoconnect/mapbox-token.svg?branch=master)](https://travis-ci.org/assoconnect/mapbox-token)
[![Coverage Status](https://coveralls.io/repos/github/assoconnect/mapbox-token/badge.svg?branch=master)](https://coveralls.io/github/assoconnect/mapbox-token?branch=master)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=assoconnect_mapbox-token&metric=alert_status)](https://sonarcloud.io/dashboard?id=assoconnect_mapbox-token)

The following feature of the Mapbox API are implemented:
- creation of a temporary token

Feel free to submit a PR or contact us if you need a missing feature.

The package uses [Guzzle](https://github.com/guzzle/guzzle) as an HTTP client.

## Installation
This package can be install with composer

`composer require assoconnect/mapbox-token`

## Usage

````
<?php

$guzzle = new GuzzleHttp\Client();
$client = new AssoConnect\MapboxToken\Client('YOUR MAPBOX USERNAME', 'YOUR MAPBOX TOKEN', $guzzle);

// Create a temporary token
$scopes = [
    'styles:read',
    'styles:tiles',
    'fonts:read',
    'datasets:read',
    'uploads:write',
    'uploads:read',
    'tokens:write',
];

$expires = new \DateTime('+ 1 hour');

$client->createTemporaryToken($scopes, $expires)->token; // New temporary Mapbox token
````
