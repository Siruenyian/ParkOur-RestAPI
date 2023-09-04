<?php

namespace App\Infrastructure\Query\MySQL;

use App\Application\Query\CariTempatQuery\CariTempatDto;
use App\Application\Query\DisplayTempatDetailQuery\DisplayTempatDetailDto;
use Illuminate\Support\Facades\DB;
use App\Application\Query\DisplayTempatDetailQuery\DisplayTempatDetailQueryInterface;
class DisplayTempatDetailQuery implements DisplayTempatDetailQueryInterface
{

    public function execute(string $id): ?DisplayTempatDetailDto
    {
        $sql="SELECT SUM(biaya) AS pendapatan FROM transaksi
                WHERE id_tempat=:id";
        $sql2="SELECT tempat.id_tempat, nama, code_tempat, latitude, longitude,SUM(avail_mobil) as avail_mobil, SUM(avail_motor) as avail_motor, SUM(max_mobil) as max_mobil, SUM(max_motor) as max_motor, price_mobil, price_motor
                FROM tempat
                INNER JOIN parkir ON parkir.id_tempat=tempat.id_tempat
                WHERE tempat.id_tempat=:id
                GROUP BY tempat.id_tempat, nama, code_tempat, latitude, longitude, price_mobil, price_motor";
        $transaksi = DB::selectOne($sql, [
            'id' => $id,
        ]);
        $tempat = DB::selectOne($sql2, [
            'id' => $id,
        ]);
        if (!$transaksi||!$tempat) {
            return null;
        }

        return new DisplayTempatDetailDto(
            $tempat->id_tempat,
            $tempat->nama,
            $tempat->avail_mobil,
            $tempat->avail_motor,
            $tempat->max_mobil,
            $tempat->max_motor,
            $tempat->price_mobil,
            $tempat->price_motor,
            $transaksi->pendapatan,
        );


    }
}
