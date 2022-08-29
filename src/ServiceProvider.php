<?php

declare(strict_types=1);
/**
 * This file is part of szwtdl/laravel-asiabill
 * @link     https://www.szwtdl.cn
 * @contact  szpengjian@gmail.com
 * @license  https://github.com/szwtdl/laravel-asiabill/blob/master/LICENSE
 */
namespace Asiabill;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Asiabill::class, function () {
            return new Asiabill(config('services.asiabill.gateway_no'), config('services.asiabill.sign_key'), config('services.asiabill.model'));
        });
        $this->app->alias(Asiabill::class, 'asiabill');
    }

    public function provides()
    {
        return [Asiabill::class, 'asiabill'];
    }
}
