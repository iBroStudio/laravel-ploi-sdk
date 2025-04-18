<?php

namespace IBroStudio\Ploi\SDK\Requests\Servers;

use IBroStudio\Contracts\Data\Hosting\NewServerData;
use IBroStudio\Ploi\Data\PloiNewServerData;
use IBroStudio\Ploi\Data\PloiServerData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateServer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected NewServerData $serverData) {}

    public function resolveEndpoint(): string
    {
        return '/servers';
    }

    protected function defaultBody(): array
    {
        dd($this->serverData->toArray());

        return $this->serverData->toArray();
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PloiServerData::from($response);
    }
}
