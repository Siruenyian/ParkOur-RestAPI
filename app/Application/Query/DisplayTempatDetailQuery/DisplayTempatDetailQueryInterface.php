<?php

namespace App\Application\Query\DisplayTempatDetailQuery;

interface DisplayTempatDetailQueryInterface
{
    public function execute(string $id) : ?DisplayTempatDetailDto;
}
