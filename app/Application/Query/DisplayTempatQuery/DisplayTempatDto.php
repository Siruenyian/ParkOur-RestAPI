<?php

namespace App\Application\Query\DisplayTempatQuery;

class DisplayTempatDto
{
    public function __construct(
        public ?string $id_tempat,
        public string $nama,
        public string $latitude,
        public string $longitude,
        public int $avail_mobil,
        public int $avail_motor,
        public int $max_mobil,
        public int $max_motor,
        public int $price_mobil,
        public int $price_motor,
    )
    { }
}
