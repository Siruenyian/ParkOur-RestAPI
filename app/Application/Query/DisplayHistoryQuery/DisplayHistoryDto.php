<?php

namespace App\Application\Query\DisplayHistoryQuery;
use DateTime;
class DisplayHistoryDto
{
//    Get Nama, jam masuk, jam keluar, time elapsed, id transaksi, status, biaya
    public function __construct(
        public string $nama,
        public DateTime $jam_masuk,
        public DateTime $jam_keluar,
        public int $time_elapsed,
        public string $id_transaksi,
        public bool $status_bayar,
        public ?int $biaya,
    )
    { }
}
