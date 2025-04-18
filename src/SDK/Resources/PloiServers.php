<?php

namespace IBroStudio\Ploi\SDK\Resources;

use IBroStudio\Contracts\Data\Hosting\NewServerData;
use IBroStudio\Contracts\Data\Hosting\ServerData;
use IBroStudio\Contracts\SDK\Hosting\Resources\ServerResource;
use IBroStudio\Ploi\Data\PloiNewServerData;
use IBroStudio\Ploi\Data\PloiServerData;
use IBroStudio\Ploi\SDK\Requests\Servers\CreateServer;
use IBroStudio\Ploi\SDK\Requests\Servers\GetServer;
use IBroStudio\Ploi\SDK\Requests\Servers\GetServers;
use Illuminate\Support\LazyCollection;
use Saloon\Http\BaseResource;

class PloiServers extends BaseResource implements ServerResource
{
    public function all(): LazyCollection
    {
        return $this->connector->paginate(
            new GetServers
        )->collect();
    }

    public function get(int|string $id): ServerData
    {
        return $this->connector->send(
            new GetServer($id)
        )->dtoOrFail();
    }

    public function create(NewServerData $serverData): ServerData
    {
        return $this->connector->send(
            new CreateServer($serverData)
        )->dtoOrFail();
    }
}
