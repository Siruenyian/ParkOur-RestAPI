<?php

namespace App\Providers;

use App\Application\Query\CariTempatQuery\CariTempatQueryInterface;
use App\Application\Query\DisplayHistoryDetailQuery\DisplayHistoryDetailQueryInterface;
use App\Application\Query\DisplayHistoryQuery\DisplayHistoryQueryInterface;
use App\Application\Query\DisplayTempatQuery\DisplayTempatQueryInterface;
use App\Core\Models\Tempat\Tempat;
use App\Core\Repository\TempatRepositoryInterface;
use App\Core\Repository\TransaksiRepositoryInterface;
use App\Infrastructure\Query\MySQL\CariTempatQuery;
use App\Infrastructure\Query\MySQL\DisplayHistoryDetailQuery;
use App\Infrastructure\Query\MySQL\DisplayHistoryQuery;
use App\Infrastructure\Query\MySQL\DisplayTempatQuery;
use App\Infrastructure\Repository\MySQL\TransaksiReposiory;
use App\Infrastructure\Repository\MySQL\TempatRepository;

class DependencyServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Repo
        $this->app->bind(TransaksiRepositoryInterface::class, TransaksiReposiory::class);
        $this->app->bind(TempatRepositoryInterface::class, TempatRepository::class);
        // Query
        $this->app->bind(CariTempatQueryInterface::class, CariTempatQuery::class);
        $this->app->bind(DisplayTempatQueryInterface::class, DisplayTempatQuery::class);
        $this->app->bind(DisplayHistoryDetailQueryInterface::class, DisplayHistoryDetailQuery::class);
        $this->app->bind(DisplayHistoryQueryInterface::class, DisplayHistoryQuery::class);

    }

}
