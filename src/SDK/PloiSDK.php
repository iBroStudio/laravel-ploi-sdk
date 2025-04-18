<?php

namespace IBroStudio\Ploi\SDK;

use IBroStudio\Contracts\SDK\Hosting\HostingManagerSDK;
use IBroStudio\Contracts\SDK\Hosting\Resources\ServerResource;
use IBroStudio\Ploi\Contracts\ManagerSDK\Resources\ServerProviderResource;
use IBroStudio\Ploi\SDK\Resources\PloiServerProviders;
use IBroStudio\Ploi\SDK\Resources\PloiServers;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\PagedPaginator;
use Saloon\PaginationPlugin\Paginator;

class PloiSDK extends Connector implements HasPagination, HostingManagerSDK
{
    protected ?string $response = PloiResponse::class;

    public function __construct(public readonly string $token) {}

    public function resolveBaseUrl(): string
    {
        return 'https://ploi.io/api';
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends PagedPaginator
        {
            protected function isLastPage(Response $response): bool
            {
                return $response->json('meta.current_page') === $response->json('meta.last_page');
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->dto();
            }
        };
    }

    public function servers(): ServerResource
    {
        return new PloiServers($this);
    }

    public function serverProviders(): ServerProviderResource
    {
        return new PloiServerProviders($this);
    }
}
