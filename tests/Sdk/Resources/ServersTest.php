<?php

use IBroStudio\Contracts\SDK\Hosting\HostingManagerSDK;
use IBroStudio\Ploi\Data\PloiNewServerData;
use IBroStudio\Ploi\Data\PloiServerData;
use IBroStudio\Ploi\Data\PloiHostingProviderData;
use IBroStudio\Ploi\Data\PloiServerProviderPlanData;
use IBroStudio\Ploi\Data\PloiServerProviderRegionData;
use IBroStudio\Ploi\Enums\DatabaseTypesEnum;
use IBroStudio\Ploi\Enums\OSTypesEnum;
use IBroStudio\Ploi\Enums\PhpVersionsEnum;
use IBroStudio\Ploi\Enums\ServerTypesEnum;
use IBroStudio\Ploi\Enums\WebServerTypesEnum;
use IBroStudio\Ploi\SDK\Requests\Servers\GetServer;
use IBroStudio\Ploi\SDK\Requests\Servers\GetServers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\LazyCollection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;

it('can retrieve all servers', function () {
    $mockClient = Saloon::fake([
        GetServers::class => MockResponse::fixture('servers'),
    ]);
    $hosting = App::make(HostingManagerSDK::class);
    $hosting->withMockClient($mockClient);
    $providers = $hosting->servers()->all();

    expect($providers)->toBeInstanceOf(LazyCollection::class)
        ->and($providers->first())->toBeInstanceOf(PloiServerData::class);
});

it('can retrieve a server', function () {
    $mockClient = Saloon::fake([
        GetServer::class => MockResponse::fixture('server'),
    ]);
    $hosting = App::make(HostingManagerSDK::class);
    $hosting->withMockClient($mockClient);

    expect(
        $hosting->servers()->get(25683)
    )->toBeInstanceOf(PloiServerData::class);
});

it('can create a server', function () {
    $hosting = App::make(HostingManagerSDK::class);
    dd(
        (new PloiNewServerData(
            name: fake()->slug(2),
            provider: new PloiHostingProviderData(id: 5849, name: 'UpCloud'),
            plan: new PloiServerProviderPlanData(id: 'DEV-1xCPU-4GB', name: 'DEV-1xCPU-4GB'),
            region: new PloiServerProviderRegionData(id: 'de-fra1', name: 'Frankfurt #1'),
            type: ServerTypesEnum::SERVER,
            database_type: DatabaseTypesEnum::MYSQL,
            webserver_type: WebServerTypesEnum::NGINX,
            os_type: OSTypesEnum::UBUNTU_24,
            php_version: PhpVersionsEnum::PHP_83,
        ))->toArray()
    );
    expect(
        $hosting->servers()->create(
            new PloiNewServerData(
                name: fake()->slug(),
                provider: new PloiHostingProviderData(id: 5849, name: 'UpCloud'),
                plan: new PloiServerProviderPlanData(id: 'DEV-1xCPU-4GB', name: 'DEV-1xCPU-4GB'),
                region: new PloiServerProviderRegionData(id: 'de-fra1', name: 'Frankfurt #1'),
                type: ServerTypesEnum::SERVER,
                database_type: DatabaseTypesEnum::MYSQL,
                webserver_type: WebServerTypesEnum::NGINX,
                os_type: OSTypesEnum::UBUNTU_24,
                php_version: PhpVersionsEnum::PHP_83,
            )
        )
    )->toBeInstanceOf(PloiServerData::class);
});
