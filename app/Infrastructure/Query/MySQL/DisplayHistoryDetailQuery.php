<?php

namespace App\Infrastructure\Query\MySQL;

use App\Application\Query\DisplayHistoryDetailQuery\DisplayHistoryDetailDto;
use App\Application\Query\DisplayHistoryDetailQuery\DisplayHistoryDetailQueryInterface;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
class DisplayHistoryDetailQuery implements DisplayHistoryDetailQueryInterface
{

    public function execute(string $id): ?DisplayHistoryDetailDto
    {
        $sql="SELECT nama, tgl_masuk, tgl_keluar, id_transaksi
                FROM transaksi
                INNER JOIN tempat ON transaksi.id_tempat=tempat.id_tempat
                WHERE id_transaksi= :id";

        $hasil = DB::selectOne($sql, [
            'id' => $id,
        ]);
        if (!$hasil) return null;
        return new DisplayHistoryDetailDto($hasil->nama,new DateTime($hasil->tgl_masuk, new DateTimeZone("Asia/Jakarta")), 1,$hasil->id_transaksi);
    }
}
