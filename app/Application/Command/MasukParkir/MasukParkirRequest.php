<?php

namespace App\Application\Command\MasukParkir;

class MasukParkirRequest
{
    public function __construct(
        public string $tempatId,
        public string $plat_nomor,
    )
    { }
}
