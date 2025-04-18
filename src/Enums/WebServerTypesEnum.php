<?php

namespace IBroStudio\Ploi\Enums;

use Filament\Support\Contracts\HasLabel;

enum WebServerTypesEnum: string implements HasLabel
{
    case NGINX = 'nginx';
    case NGX_DOCKER = 'nginx-docker';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NGINX => 'NGINX',
            self::NGX_DOCKER => 'NGINX+Docker',
        };
    }
}
