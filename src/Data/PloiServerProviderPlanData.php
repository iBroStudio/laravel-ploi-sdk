<?php

namespace IBroStudio\Ploi\Data;

use IBroStudio\DataRepository\ValueObjects\Units\Byte\ByteUnit;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class PloiServerProviderPlanData extends Data
{
    #[Computed]
    public int $cpu;

    #[Computed]
    public ByteUnit $ram;

    #[Computed]
    public ByteUnit $disk;

    public function __construct(
        #[MapOutputName('provider_reference')]
        public string $id,
        public string $name,
        public ?string $description = null,
    ) {
        if (! is_null($this->description)) {
            Str::of($this->description)
                ->after(']')
                ->squish()
                ->explode(' - ')
                ->mapWithKeys(function (string $item) {
                    return match (true) {
                        Str::contains($item, 'RAM') => [
                            'ram' => ByteUnit::make(Str::before($item, ' RAM')),
                        ],
                        Str::contains($item, 'CPU') => [
                            'cpu' => (int) Str::of($item)->match('/\\d+/')->toString(),
                        ],
                        Str::contains($item, 'Disk') => [
                            'disk' => ByteUnit::make(Str::after($item, 'Disk: ')),
                        ],
                    };
                })->each(function (mixed $item, $key) {
                    $this->{$key} = $item;
                });
        }
    }
}
