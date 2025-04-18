<?php

namespace IBroStudio\Ploi\SDK\Requests\ServerProviders;

use IBroStudio\Ploi\Data\PloiHostingProviderData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetServerProvider extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly int $id)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return "/user/server-providers/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PloiHostingProviderData::from($response);
    }
}
