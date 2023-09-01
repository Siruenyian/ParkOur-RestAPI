<?php

namespace App\Core\Repository;

use App\Core\Models\Transaksi\Transaksi;
use App\Core\Models\Transaksi\TransaksiId;
use DateTime;
interface TransaksiRepositoryInterface
{
    public function byId(TransaksiId $id): ?Transaksi;
    public function byDate(DateTime $dateTime): ?array;
    public function save(Transaksi $transaksi): void;
    public function update(Transaksi $transaksi): void;
}
