<?php

namespace App\Infrastructure\Repository\MySQL;
use App\Core\Repository\TempatRepositoryInterface;
use App\Core\Models\Tempat\Tempat;
use App\Core\Models\Tempat\TempatId;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
class TempatRepository implements TempatRepositoryInterface
{

    public function byId(TempatId $id): ?Tempat
    {
        $row = DB::table('tempat')->where('id_tempat', $id->id())->first();
        if (!$row) return null;

        return new Tempat(new TempatId($row->id_tempat),
            $row->nama, $row->alamat, $row->latitude, $row->longitude, $row->price_mobil, $row->price_motor);
    }

    public function byLatlong(float $latitude, float $longitude): ?Tempat
    {
        // TODO: Implement byLatlong() method.
        return null;
    }

    public function save(Tempat $tempat): void
    {
        // TODO: Implement save() method.
    }

    public function update(Tempat $tempat): void
    {
        // TODO: Implement update() method.
    }
}
