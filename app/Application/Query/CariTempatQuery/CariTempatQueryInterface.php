<?php

namespace App\Application\Query\CariTempatQuery;

interface CariTempatQueryInterface
{
    public function execute(string $nama) : ?array;
}
