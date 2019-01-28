<?php

namespace AssoConnect\MapboxToken\Object;

class TemporaryToken extends AbstractHydratable
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var \DateTime
     */
    public $expires;
}
