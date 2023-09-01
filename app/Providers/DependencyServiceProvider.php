<?php

namespace App\Providers;

use App\Application\Query\ListParkirQuery\ListParkirQueryInterface;
use App\Core\Models\Tempat\Tempat;
use App\Core\Repository\TempatRepositoryInterface;
use App\Core\Repository\TransaksiRepositoryInterface;
use App\Infrastructure\Query\MySQL\ListParkirQuery;
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
        $this->app->bind(ListParkirQueryInterface::class, ListParkirQuery::class);
    }

}
