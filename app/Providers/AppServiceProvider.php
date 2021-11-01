<?php

namespace App\Providers;

use App\Exceptions\BaseException;
use App\Utils\Result;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    private $appRepositories = [
        "Blogger", "Category", "Writter"
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
    private function bindRepositories()
    {
        $appRepositories = $this->appRepositories;
        foreach ($appRepositories as $key => $repository) {
            $classInterfaces = "App\\Repositories\\Interfaces\\{$repository}Interface";
            $classModel = "App\\Models\\{$repository}";
            if (!class_exists($classModel)) {
                $classModel = "App\\{$repository}";
            }
            $classRepository = "App\\Repositories\\Eloquents\\{$repository}Repository";
            if (!class_exists($classModel) || !class_exists($classRepository) || !interface_exists($classInterfaces)) {
                throw new BaseException(Result::ERROR, "a {$repository} class does not exists.");
            }
            // dd($classInterfaces);
            $this->app->bind($classInterfaces, function () use ($classModel, $classRepository) {
                return new $classRepository(new $classModel());
            });
        }
    }
}
