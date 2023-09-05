<?php

namespace App\Application\Query\CekBiayaQuery;

interface CekBiayaQueryInterface
{
    public function execute(string $id) : ?CekBiayaDto;
}
