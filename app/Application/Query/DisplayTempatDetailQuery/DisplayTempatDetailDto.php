<?php

namespace App\Application\Query\DisplayTempatDetailQuery;

class DisplayTempatDetailDto
{
    public function __construct(
        public ?string $id_tempat,
        public string $nama,
        public int $avail_mobil,
        public int $avail_motor,
        public int $max_mobil,
        public int $max_motor,
        public int $price_mobil,
        public int $price_motor,
        public ?int $pendapatan,
    )
    { }
}
