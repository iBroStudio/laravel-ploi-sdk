<?php

namespace IBroStudio\Ploi\SDK\Requests\Servers;

use IBroStudio\Ploi\Data\PloiServerData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetServers extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/servers';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return PloiServerData::collectPloi($response);
    }
}
