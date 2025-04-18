<?php

namespace IBroStudio\Ploi\Enums;

enum ServerStatusesEnum: string
{
    case CREATED = 'created';
    case CREATING_FAILED = 'creating-failed';
    case BUILDING = 'building';
    case BUILDING_FAILED = 'building-failed';
    case ACTIVE = 'active';
    case UNREACHABLE = 'unreachable';
    case DESTROYING = 'destroying';
    case REFRESHING = 'refreshing';
    case REBOOTING = 'rebooting';
}
