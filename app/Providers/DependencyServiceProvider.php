<?php

namespace App\Providers;

use App\Application\Query\ListParkirQuery\ListParkirQueryInterface;
use App\Infrastructure\Query\MySQL\ListParkirQuery;

class DependencyServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        // Query
        $this->app->bind(ListParkirQueryInterface::class, ListParkirQuery::class);
    }

}
