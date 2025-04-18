<?php

namespace IBroStudio\Ploi\Enums;

enum QueueStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case DELETING = 'deleting';
}
