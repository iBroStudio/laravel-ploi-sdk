<?php

namespace IBroStudio\Ploi\Enums;

enum DaemonsStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case RESTARTING = 'restarting';
    case DELETING = 'deleting';
}
