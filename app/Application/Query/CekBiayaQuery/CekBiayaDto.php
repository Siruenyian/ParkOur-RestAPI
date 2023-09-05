<?php

namespace App\Application\Query\CekBiayaQuery;
use DateTime;
class CekBiayaDto
{
    public function __construct(
        public int $price_total,
        public DateTime $jam_masuk,
        public DateTime $jam_keluar,
    )
    { }
}
