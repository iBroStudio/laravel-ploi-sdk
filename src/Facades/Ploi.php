<?php

namespace IBroStudio\Ploi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IBroStudio\Ploi\Ploi
 */
class Ploi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \IBroStudio\Ploi\Ploi::class;
    }
}
