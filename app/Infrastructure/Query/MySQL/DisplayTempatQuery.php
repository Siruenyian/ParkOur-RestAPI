<?php

namespace App\Infrastructure\Query\MySQL;

use App\Application\Query\CariTempatQuery\CariTempatDto;
use App\Application\Query\DisplayTempatQuery\DisplayTempatDto;
use Illuminate\Support\Facades\DB;
use App\Application\Query\DisplayTempatQuery\DisplayTempatQueryInterface;
class DisplayTempatQuery implements DisplayTempatQueryInterface
{

    public function execute(): ?array
    {
        $sql="SELECT tempat.id_tempat, nama, code_tempat, latitude, longitude,SUM(avail_mobil) as avail_mobil, SUM(avail_motor) as avail_motor, SUM(max_mobil) as max_mobil, SUM(max_motor) as max_motor, price_mobil, price_motor
                FROM tempat
                INNER JOIN parkir ON parkir.id_tempat=tempat.id_tempat
                GROUP BY nama, tempat.id_tempat, code_tempat, latitude, longitude, price_mobil, price_motor
                ORDER BY nama";
        $result = DB::select($sql);
        $daftarGedung = array();
        foreach ($result as $hasil) {
            $daftarGedung[] = new DisplayTempatDto(
                $hasil->id_tempat,
                $hasil->nama,
                $hasil->latitude,
                $hasil->longitude,
                $hasil->avail_mobil,
                $hasil->avail_motor,
                $hasil->max_mobil,
                $hasil->max_motor,
                $hasil->price_mobil,
                $hasil->price_motor,
            );
        }

        return $daftarGedung;

    }
}
