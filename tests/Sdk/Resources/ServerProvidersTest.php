<?php

use IBroStudio\Ploi\Contracts\HostingManager;
use IBroStudio\Ploi\Data\PloiHostingProviderData;
use IBroStudio\Ploi\SDK\Requests\ServerProviders\GetServerProvider;
use IBroStudio\Ploi\SDK\Requests\ServerProviders\GetServerProviders;
use Illuminate\Support\Facades\App;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

it('can retrieve all server providers', function () {
    $mockClient = Saloon::fake([
        GetServerProviders::class => MockResponse::fixture('providers'),
    ]);
    $hosting = App::make(HostingManager::class);
    $hosting->withMockClient($mockClient);
    $providers = $hosting->serverProviders()->all();

    expect($providers)->toBeInstanceOf(LazyCollection::class)
        ->and($providers->first())->toBeInstanceOf(PloiHostingProviderData::class);
});

it('can retrieve a server provider', function () {
    $mockClient = Saloon::fake([
        GetServerProvider::class => MockResponse::fixture('provider'),
    ]);
    $hosting = App::make(HostingManager::class);
    $hosting->withMockClient($mockClient);

    expect(
        $hosting->serverProviders()->get(5849)
    )->toBeInstanceOf(PloiHostingProviderData::class);
});
