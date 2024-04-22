<?php

namespace App\Providers;


use App\Repositories\AthleteRepository;
use App\Repositories\BrandRepository;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\Contracts\AthleteRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\WishlistRepositoryInterface;
use App\Repositories\WishlistRepository;
use App\View\Components\AppLayout;
use App\View\Components\GuestLayout;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(WishlistRepositoryInterface::class, WishlistRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(AthleteRepositoryInterface::class, AthleteRepository::class);

    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Blade::component('app-layout', AppLayout::class);
      Blade::component('guest-layout', GuestLayout::class);
    }
}
