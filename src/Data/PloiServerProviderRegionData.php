<?php

namespace IBroStudio\Ploi\Data;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class PloiServerProviderRegionData extends Data
{
    public function __construct(
        #[MapOutputName('provider_reference')]
        public string $id,
        public string $name
    ) {}
}
