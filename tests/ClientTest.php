<?php

declare(strict_types=1);
namespace AssoConnect\Tests;

use AssoConnect\MapboxToken\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    protected function createClient() :Client
    {
        $token = getenv('MAPBOX_TOKEN');
        $username = getenv('MAPBOX_USERNAME');

        self::assertIsString($token);
        self::assertIsString($username);

        $guzzleClient = new \GuzzleHttp\Client();

        return new Client($username, $token, $guzzleClient);
    }

    public function testCreateTemporaryToken(): void
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

        $expires = new \DateTimeImmutable('+1 hour');

        $temporaryToken = $client->createTemporaryToken($scopes, $expires);
        self::assertNotEmpty($temporaryToken->token);
    }
}
