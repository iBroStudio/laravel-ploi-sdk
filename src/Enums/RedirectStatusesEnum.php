<?php

namespace IBroStudio\Ploi\Enums;

enum RedirectStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case DESTROYING = 'destroying';
}
