<?php

namespace IBroStudio\Ploi\Enums;

use Filament\Support\Contracts\HasLabel;

enum OSTypesEnum: string implements HasLabel
{
    case UBUNTU_24 = 'ubuntu-24-04-lts';
    case UBUNTU_22 = 'ubuntu-22-04-lts';
    case UBUNTU_20 = 'ubuntu-20-04-lts';
    case UBUNTU_18 = 'ubuntu-18-04-lts';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UBUNTU_24 => 'Ubuntu 24.04 LTS',
            self::UBUNTU_22 => 'Ubuntu 22.04 LTS',
            self::UBUNTU_20 => 'Ubuntu 20.04 LTS',
            self::UBUNTU_18 => 'Ubuntu 18.04 LTS',
        };
    }
}
