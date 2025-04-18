<?php

namespace IBroStudio\Ploi\Enums;

enum CronjobStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case DELETING = 'deleting';
}
