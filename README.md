# mapbox-token
PHP client for Mapbox Token API

[![Build Status](https://travis-ci.org/assoconnect/mapbox-token.svg?branch=master)](https://travis-ci.org/assoconnect/mapbox-token)
[![Coverage Status](https://coveralls.io/repos/github/assoconnect/mapbox-token/badge.svg?branch=master)](https://coveralls.io/github/assoconnect/mapbox-token?branch=master)

The following feature of the Mapbox API are implemented:
- creation of a temporary token

Feel free to submit a PR or contact us if you need a missing feature.

The package uses [Guzzle](https://github.com/guzzle/guzzle) as an HTTP client.

## installation
This package can be install with composer

`composer required assoconnect/mapbox-token`

## usage

````
<?php

$guzzle = GuzzleHttp\Client();
$client = new AssoConnect\SMoney\Client('YOUR S-MONEY ENDPOINT', 'YOUR S-MONEY TOKEN', $guzzle);

//Create a temporary token
$scopes = [
    'styles:read',
    'styles:tiles',
    'fonts:read',
    'datasets:read',
    'uploads:write',
    'uploads:read',
    'tokens:write',
];

$date = new \DateTime();
$expires = $date->modify('+ 1 hour');

$client->createTemporaryToken($scopes, $expires)->token; // New temporary Mapbox token
````