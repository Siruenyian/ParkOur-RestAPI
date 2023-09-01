<?php

namespace App\Core\Repository;

use App\Core\Models\Tempat\TempatId;
use App\Core\Models\Tempat\Tempat;
use App\Core\Models\Transaksi\Transaksi;

interface TempatRepositoryInterface
{
    public function byId(TempatId $id): ?Tempat;
    public function byLatlong(float $latitude, float $longitude): ?Tempat;
    public function save(Tempat $tempat): void;
    public function update(Tempat $tempat): void;
}
