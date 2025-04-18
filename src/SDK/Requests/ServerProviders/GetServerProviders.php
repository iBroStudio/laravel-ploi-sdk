<?php

namespace IBroStudio\Ploi\SDK\Requests\ServerProviders;

use IBroStudio\Ploi\Data\PloiHostingProviderData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetServerProviders extends Request implements Paginatable
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/server-providers';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return PloiHostingProviderData::collectPloi($response);
    }
}
