<?php

namespace IBroStudio\Ploi\Enums;

enum CertificateStatusesEnum: string
{
    case CREATED = 'created';
    case ACTIVE = 'active';
    case DELETING = 'deleting';
}
