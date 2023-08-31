<?php

namespace App\Application\Query\ListParkirQuery;

interface ListParkirQueryInterface
{
    public function execute(string $nama) : ?array;
}
