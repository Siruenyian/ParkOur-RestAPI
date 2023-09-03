<?php

namespace App\Infrastructure\Query\MySQL;
use App\Application\Query\DisplayHistoryQuery\DisplayHistoryDto;
use App\Application\Query\DisplayHistoryQuery\DisplayHistoryQueryInterface;
use App\Application\Query\DisplayTempatQuery\DisplayTempatDetailDto;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class DisplayHistoryQuery implements DisplayHistoryQueryInterface
{

    public function execute(): ?array
    {
        $sql="SELECT nama, tgl_masuk, tgl_keluar, TIMESTAMPDIFF(HOUR, tgl_masuk, tgl_keluar) as time_elapsed, id_transaksi, status_bayar, biaya
                FROM transaksi
                INNER JOIN tempat ON transaksi.id_tempat=tempat.id_tempat";
        $result = DB::select($sql);
        $history = array();
        foreach ($result as $hasil) {
            $history[] = new DisplayHistoryDto(
                $hasil->nama,
                new DateTime($hasil->tgl_masuk, new DateTimeZone("Asia/Jakarta")),
                new DateTime($hasil->tgl_keluar, new DateTimeZone("Asia/Jakarta")),
                intval($hasil->time_elapsed),
                $hasil->id_transaksi,
                $hasil->status_bayar,
                $hasil->biaya,
            );
        }

        return $history;
    }

}
