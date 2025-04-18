<?php

namespace IBroStudio\Ploi\Data;

use Carbon\Carbon;
use DateTime;
use IBroStudio\Contracts\Data\Hosting\ServerData;
use IBroStudio\DataRepository\ValueObjects\IpAddress;
use IBroStudio\Ploi\Enums\DatabaseTypesEnum;
use IBroStudio\Ploi\Enums\ServerStatusesEnum;
use IBroStudio\Ploi\Enums\ServerTypesEnum;
use IBroStudio\Ploi\SDK\PloiResponse;
use Illuminate\Support\Arr;
use Saloon\Http\Response;
use Spatie\LaravelData\Data;

class PloiServerData extends Data implements ServerData
{
    public function __construct(
        public int $id,
        public ServerStatusesEnum|string $status,
        public ServerTypesEnum|string $type,
        public DatabaseTypesEnum|string $database_type,
        public string $name,
        public IpAddress|string $ip_address,
        public int                           $ssh_port,
        public bool                          $reboot_required,
        public string                        $php_version,
        public string                        $php_cli_version,
        public string                        $mysql_version,
        public int                           $sites_count,
        public bool                          $monitoring,
        public bool                          $opcache,
        public array                         $installed_php_versions,
        public array                         $updates,
        public PloiHostingProviderData|array $provider,
        public int                           $status_id,
        public DateTime|string               $created_at,
        public string                        $created_human,
        public IpAddress|string|null         $internal_ip = null,
        public ?string                       $description = null,
        public ?string                       $uptime_human = null,
        public ?array                        $tags = null
    ) {
        $this
            ->_type()
            ->_status()
            ->_database()
            ->_ip_address()
            ->_internal_ip()
            ->_provider()
            ->_created_at();
    }

    public static function fromPloi(PloiResponse $response): self
    {
        return new self(...$response->json()['data']);
    }

    public static function collectPloi(PloiResponse|Response $response): array
    {
        return Arr::map($response->json()['data'], function (array $data) {
            if (is_null($data['uptime_human'])) {
                // dd($data);
            }

            return new self(...$data);
        });
    }

    private function _type(): self
    {
        if (is_string($this->type)) {
            $this->type = ServerTypesEnum::from($this->type);
        }

        return $this;
    }

    private function _status(): self
    {
        if (is_string($this->status)) {
            $this->status = ServerStatusesEnum::from($this->status);
        }

        return $this;
    }

    private function _database(): self
    {
        if (is_string($this->database_type)) {
            try {
                $this->database_type = DatabaseTypesEnum::from($this->database_type);
            } catch (\ValueError $e) {
                dd($this->database_type);
            }
        }

        return $this;
    }

    private function _ip_address(): self
    {
        if (is_string($this->ip_address)) {
            $this->ip_address = IpAddress::from($this->ip_address);
        }

        return $this;
    }

    private function _internal_ip(): self
    {
        if (is_string($this->internal_ip)) {
            $this->internal_ip = IpAddress::from($this->internal_ip);
        }

        return $this;
    }

    private function _provider(): self
    {
        if (is_array($this->provider)) {
            $this->provider = PloiHostingProviderData::from($this->provider);
        }

        return $this;
    }

    private function _created_at(): void
    {
        if (is_string($this->created_at)) {
            $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        }
    }
}
