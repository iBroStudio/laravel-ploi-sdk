<?php

namespace IBroStudio\Ploi\Enums;

use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasLabel;

enum ServerTypesEnum: string implements HasDescription, HasLabel
{
    case SERVER = 'server';
    case DB = 'database-server';
    case DOCKER = 'docker-server';
    case ELASTICSEARCH = 'elasticsearch-server';
    case LB = 'load-balancer';
    case MEILISEARCH = 'meilisearch-server';
    case PLAIN = 'plain-server';
    case REDIS = 'redis-server';
    case STORAGE = 'storage-server';
    case WORKER = 'worker-server';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SERVER => 'Server',
            self::DB => 'Database Server',
            self::DOCKER => 'Docker Server',
            self::ELASTICSEARCH => 'Elasticsearch Server',
            self::LB => 'Load Balancer',
            self::MEILISEARCH => 'Meilsearch Server',
            self::PLAIN => 'Plain Server',
            self::REDIS => 'Redis Server',
            self::STORAGE => 'Storage Server',
            self::WORKER => 'Worker Server',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::SERVER => 'NGINX, PHP, Redis, Memcached, Supervisor, Database',
            self::DB => 'MySQL, MariaDB or PostgreSQL',
            self::DOCKER => 'Docker, Supervisor',
            self::ELASTICSEARCH => 'Elasticsearch',
            self::LB => 'HaProxy',
            self::MEILISEARCH => 'MeiliSearch',
            self::PLAIN => 'Supervisor',
            self::REDIS => 'Redis',
            self::STORAGE => 'S3 Minio storage',
            self::WORKER => 'PHP, Supervisor',
        };
    }
}
