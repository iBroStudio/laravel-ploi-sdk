<?php

namespace IBroStudio\Ploi\Enums;

use Filament\Support\Contracts\HasLabel;

enum PhpVersionsEnum: string implements HasLabel
{
    case PHP_83 = '8.3';
    case PHP_82 = '8.2';
    case PHP_81 = '8.1';
    case PHP_80 = '8.0';
    case PHP_74 = '7.4';
    case PHP_73 = '7.3';
    case PHP_72 = '7.2';
    case PHP_71 = '7.1';
    case PHP_70 = '7.0';
    case PHP_56 = '5.6';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PHP_83 => 'PHP 8.3',
            self::PHP_82 => 'PHP 8.2',
            self::PHP_81 => 'PHP 8.1',
            self::PHP_80 => 'PHP 8.0',
            self::PHP_74 => 'PHP 7.4',
            self::PHP_73 => 'PHP 7.3',
            self::PHP_72 => 'PHP 7.2',
            self::PHP_71 => 'PHP 7.1',
            self::PHP_70 => 'PHP 7.0',
            self::PHP_56 => 'PHP 5.6',
        };
    }
}
