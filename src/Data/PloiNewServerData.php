<?php

namespace IBroStudio\Ploi\Data;

use IBroStudio\Contracts\Data\Hosting\NewServerData;
use IBroStudio\DataRepository\Transformers\DataObjectTransformer;
use IBroStudio\Ploi\Enums\DatabaseTypesEnum;
use IBroStudio\Ploi\Enums\OSTypesEnum;
use IBroStudio\Ploi\Enums\PhpVersionsEnum;
use IBroStudio\Ploi\Enums\ServerTypesEnum;
use IBroStudio\Ploi\Enums\WebServerTypesEnum;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;

class PloiNewServerData extends Data implements NewServerData
{
    public function __construct(
        public string                       $name,
        #[WithTransformer(DataObjectTransformer::class, key: 'id')]
        public PloiHostingProviderData      $provider,
        #[WithTransformer(DataObjectTransformer::class, key: 'id')]
        public PloiServerProviderPlanData   $plan,
        #[WithTransformer(DataObjectTransformer::class, key: 'id')]
        public PloiServerProviderRegionData $region,
        public ServerTypesEnum              $type,
        public DatabaseTypesEnum            $database_type,
        public WebServerTypesEnum           $webserver_type,
        public OSTypesEnum                  $os_type,
        public PhpVersionsEnum              $php_version,
        public bool                         $install_monitoring = true,
        public ?string                      $description = null,
        public ?string                      $webhook_url = null
    ) {}
}
