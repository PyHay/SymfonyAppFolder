<?php

declare(strict_types=1);

namespace App\Service;

use Fresh\CentrifugoBundle\Service\CentrifugoInterface;

class CentrifugoService
{
    public function __construct(
        private readonly CentrifugoInterface $centrifugo
    ) {
    }

    public function example(): void
    {
        $this->centrifugo->publish(["foo" => "bar"], "channelName");
    }
}
