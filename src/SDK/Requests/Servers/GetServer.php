<?php

namespace IBroStudio\Ploi\SDK\Requests\Servers;

use IBroStudio\Ploi\Data\PloiServerData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetServer extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return "/servers/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PloiServerData::from($response);
    }
}
