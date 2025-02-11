<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepo;
use App\Repositories\Category\ICategoryRepo;
use App\Repositories\Location\ILocationRepo;
use App\Repositories\Location\LocationRepo;
use App\Repositories\User\IUserRepo;
use App\Repositories\User\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ICategoryRepo::class => CategoryRepo::class,
        IUserRepo::class => UserRepo::class,
    ];
}
