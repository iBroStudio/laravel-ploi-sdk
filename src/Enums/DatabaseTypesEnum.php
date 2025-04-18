<?php

namespace IBroStudio\Ploi\Enums;

use Filament\Support\Contracts\HasLabel;

enum DatabaseTypesEnum: string implements HasLabel
{
    case MYSQL = 'mysql';
    case MYSQL_8 = 'mysql8';
    case MARIADB_112 = 'mariadb112';
    case MARIADB_1011 = 'mariadb';
    case POSTGRESQL_16 = 'postgresql16';
    case POSTGRESQL_15 = 'postgresql15';
    case POSTGRESQL_14 = 'postgresql14';
    case POSTGRESQL_13 = 'postgresql13';
    case POSTGRESQL_12 = 'postgresql12';
    case NONE = 'none';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::MYSQL => 'MySQL',
            self::MYSQL_8 => 'MySQL 8',
            self::MARIADB_112 => 'MariaDB 11.2',
            self::MARIADB_1011 => 'MariaDB 10.11',
            self::POSTGRESQL_16 => 'PostgreSQL 16',
            self::POSTGRESQL_15 => 'PostgreSQL 15',
            self::POSTGRESQL_14 => 'PostgreSQL 14',
            self::POSTGRESQL_13 => 'PostgreSQL 13',
            self::POSTGRESQL_12 => 'PostgreSQL 12',
            self::NONE => 'No database',
        };
    }
}
