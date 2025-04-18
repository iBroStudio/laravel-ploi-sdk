<?php

namespace IBroStudio\Ploi\Enums;

enum DatabaseStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case DELETING = 'deleting';
}
