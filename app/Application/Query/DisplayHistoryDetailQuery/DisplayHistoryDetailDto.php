<?php

namespace App\Application\Query\DisplayHistoryDetailQuery;
use DateTime;
class DisplayHistoryDetailDto
{
//    Get  id transaksi, area, nama, jam masuk
    public function __construct(
        public string $nama,
        public DateTime $jam_masuk,
        public int $lantai,
        public string $transaksi_id,
    )
    { }
}
