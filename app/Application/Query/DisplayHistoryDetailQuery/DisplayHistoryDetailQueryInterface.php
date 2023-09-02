<?php

namespace App\Application\Query\DisplayHistoryDetailQuery;

interface DisplayHistoryDetailQueryInterface
{
    public function execute(string $id) : ?DisplayHistoryDetailDto;
}
