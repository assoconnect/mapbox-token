<?php

declare(strict_types=1);
namespace AssoConnect\MapboxToken\Object;

class TemporaryToken
{
    public function __construct(
        public readonly string $token,
        public readonly \DateTimeImmutable $expires,
    ) {
    }
}
