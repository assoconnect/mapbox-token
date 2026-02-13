<?php

declare(strict_types=1);
namespace AssoConnect\MapboxToken;

use AssoConnect\MapboxToken\Object\TemporaryToken;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $token;

    public function __construct(string $username, string $token, ClientInterface $client)
    {
        $this->client = $client;
        $this->username = $username;
        $this->token = $token;
    }

    /**
     * @param array<string, mixed>|null $data
     */
    protected function query(string $method, string $path, ?array $data = null) :ResponseInterface
    {
        if ($method === 'POST') {
            return $this->client->request($method, 'https://api.mapbox.com' . $path . '?access_token=' . $this->token, [
                'json' => $data,
                'headers' => [
                    'Content-Type'  => 'application/json',
                ],
            ]);
        }
        throw new \DomainException('Unsupported method');
    }

    /**
     * @param list<string> $scopes
     */
    public function createTemporaryToken(array $scopes, \DateTimeImmutable $expires) :TemporaryToken
    {
        $method = 'POST';

        $data = [
            'expires' => $expires->format('c'),
            'scopes' => $scopes,
        ];

        $res = $this->query($method, '/tokens/v2/' . $this->username, $data);
        /** @var array{token: string} $responseData */
        $responseData = json_decode($res->getBody()->__toString(), true);

        return new TemporaryToken($responseData['token'], $expires);
    }
}
