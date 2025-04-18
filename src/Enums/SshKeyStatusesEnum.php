<?php

namespace IBroStudio\Ploi\Enums;

enum SshKeyStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case DESTROYING = 'destroying';
}
