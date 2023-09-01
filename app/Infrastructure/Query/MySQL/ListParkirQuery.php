<?php

namespace App\Infrastructure\Query\MySQL;
use App\Application\Query\ListParkirQuery\ListParkirDto;
use App\Application\Query\ListParkirQuery\ListParkirQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;
class ListParkirQuery implements ListParkirQueryInterface
{

    public function execute(string $nama): ?array
    {
//        $sql="SELECT nama, latitude, longitude, lantai,avail_mobil, avail_motor, max_mobil, max_motor, price_mobil, price_motor
//                FROM tempat
//                INNER JOIN parkir ON parkir.id_tempat=tempat.id_tempat
//                WHERE nama=:nama_tempat";
        $sql="SELECT nama, latitude, longitude,SUM(avail_mobil), SUM(avail_motor), SUM(max_mobil), SUM(max_motor), price_mobil, price_motor
                FROM tempat
                INNER JOIN parkir ON parkir.id_tempat=tempat.id_tempat
                WHERE nama=:nama_tempat";
        $result = DB::select($sql, [
            'nama_tempat' => $nama,
        ]);
        $daftarParkir = array();
        foreach ($result as $hasil) {
            $daftarParkir[] = new ListParkirDto(
                $hasil->nama,
                $hasil->latitude,
                $hasil->longitude,
                $hasil->lantai,
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
