<?php

namespace AssoConnect\Tests;

use AssoConnect\MapboxToken\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    protected function createClient() :Client
    {
        $token = getenv('MAPBOX_TOKEN');
        $username = getenv('MAPBOX_USERNAME');

        $guzzleClient = new \GuzzleHttp\Client();

        $client = new Client($username, $token, $guzzleClient);

        return $client;
    }

    public function testCreateTemporaryToken()
    {
        $client = $this->createClient();

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

        $temporaryToken = $client->createTemporaryToken($scopes, $expires);
        $this->assertNotNull($temporaryToken->token);
    }
}
