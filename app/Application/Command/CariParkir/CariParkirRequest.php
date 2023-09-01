<?php

namespace App\Application\Command\CariParkir;

class CariParkirRequest
{
    public function __construct(
        public string $tempatId,
        public string $plat_nomor,
    )
    { }
}
