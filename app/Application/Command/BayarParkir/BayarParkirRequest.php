<?php

namespace App\Application\Command\BayarParkir;

class BayarParkirRequest
{
    public function __construct(
        public string $transaksiId,
        public string $tempatId,
    )
    { }
}
