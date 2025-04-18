<?php

namespace IBroStudio\Ploi\Data;

use IBroStudio\Contracts\Data\Hosting\HostingProviderData;
use IBroStudio\Ploi\SDK\PloiResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Http\Response;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class PloiHostingProviderData extends Data implements HostingProviderData
{
    public function __construct(
        #[MapOutputName('hosting_manager_id')]
        public int $id,
        public string $name,
        public ?string $logo = null,
        /** @var Collection<int, PloiServerProviderPlanData> */
        public ?Collection $plans = null,
        /** @var Collection<int, PloiServerProviderRegionData> */
        public ?Collection $regions = null,
    ) {}

    public static function fromPloi(PloiResponse $response): self
    {
        $data = $response->json()['data'];

        return new self(
            id: $data['id'],
            name: $data['name'],
            logo: $data['provider']['logo'],
            plans: PloiServerProviderPlanData::collect($data['provider']['plans'], Collection::class),
            regions: PloiServerProviderRegionData::collect($data['provider']['regions'], Collection::class)
        );
    }

    public static function collectPloi(PloiResponse|Response $response): array
    {
        return Arr::map($response->json()['data'], function (array $data) {
            return new self(
                id: $data['id'],
                name: $data['name'],
                logo: $data['provider']['logo'],
                plans: PloiServerProviderPlanData::collect($data['provider']['plans'], Collection::class),
                regions: PloiServerProviderRegionData::collect($data['provider']['regions'], Collection::class)
            );
        });
    }
}
