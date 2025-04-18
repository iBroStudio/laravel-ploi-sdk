<?php

namespace IBroStudio\Ploi\SDK\Resources;

use IBroStudio\Ploi\Contracts\ManagerSDK\Resources\ServerProviderResource;
use IBroStudio\Ploi\Data\PloiHostingProviderData;
use IBroStudio\Ploi\SDK\Requests\ServerProviders\GetServerProvider;
use IBroStudio\Ploi\SDK\Requests\ServerProviders\GetServerProviders;
use Illuminate\Support\LazyCollection;
use Saloon\Http\BaseResource;

class PloiServerProviders extends BaseResource implements ServerProviderResource
{
    public function all(): LazyCollection
    {
        return $this->connector->paginate(
            new GetServerProviders
        )->collect();
    }

    public function get(int $id): PloiHostingProviderData
    {
        return $this->connector->send(
            new GetServerProvider($id)
        )->dtoOrFail();
    }
}
