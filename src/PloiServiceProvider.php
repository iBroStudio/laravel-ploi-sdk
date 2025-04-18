<?php

namespace IBroStudio\Ploi;

use IBroStudio\Contracts\SDK\Hosting\HostingManagerSDK;
use IBroStudio\Ploi\SDK\PloiSDK;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PloiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-ploi-sdk')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->app->singleton(
            abstract: HostingManagerSDK::class,
            concrete: fn () => new PloiSDK(config('ploi-sdk.api_token'))
        );
    }
}
