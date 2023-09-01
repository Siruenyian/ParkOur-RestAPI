<?php

namespace App\Core\Repository;

use App\Core\Models\Parkir\Parkir;
use App\Core\Models\Parkir\ParkirId;

interface ParkirRepositoryInterface
{
    public function byId(ParkirId $id): ?Parkir;
    public function save(Parkir $parkir): void;
    public function update(Parkir $parkir): void;
}
