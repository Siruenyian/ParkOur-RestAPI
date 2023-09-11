<?php

namespace App\Infrastructure\Query\MySQL;
use App\Application\Query\CariTempatQuery\CariTempatDto;
use App\Application\Query\CariTempatQuery\CariTempatQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;
class CariTempatQuery implements CariTempatQueryInterface
{

    public function execute(string $nama): ?array
    {

        $sql="SELECT nama, alamat, code_tempat, latitude, longitude,SUM(avail_mobil) as avail_mobil, SUM(avail_motor) as avail_motor, SUM(max_mobil) as max_mobil, SUM(max_motor) as max_motor, price_mobil, price_motor
                FROM tempat
                INNER JOIN parkir ON parkir.id_tempat=tempat.id_tempat
                WHERE nama LIKE :nama_tempat
                GROUP BY nama, alamat, code_tempat, latitude, longitude, price_mobil, price_motor";
        $result = DB::select($sql, [
            'nama_tempat' => "%".$nama."%",
        ]);
        $daftarParkir = array();
        foreach ($result as $hasil) {
            $daftarParkir[] = new CariTempatDto(
                $hasil->nama,
                $hasil->alamat,
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

        return $daftarParkir;

    }
}
