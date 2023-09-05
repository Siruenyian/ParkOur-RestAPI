<?php

namespace App\Infrastructure\Query\MySQL;

use App\Application\Query\CekBiayaQuery\CekBiayaDto;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use App\Application\Query\CekBiayaQuery\CekBiayaQueryInterface;
class CekBiayaQuery implements CekBiayaQueryInterface
{

    public function execute(string $id): ?CekBiayaDto
    {
        $sql="SELECT biaya, tgl_masuk, tgl_keluar
                FROM transaksi
                WHERE id_transaksi= :id";

        $hasil = DB::selectOne($sql, [
            'id' => $id,
        ]);
        if (!$hasil) return null;
        return new CekBiayaDto($hasil->biaya, new DateTime($hasil->tgl_masuk, new DateTimeZone("Asia/Jakarta")),
            new DateTime($hasil->tgl_keluar, new DateTimeZone("Asia/Jakarta")));
    }
}
