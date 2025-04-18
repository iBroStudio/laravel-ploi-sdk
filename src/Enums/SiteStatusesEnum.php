<?php

namespace IBroStudio\Ploi\Enums;

enum SiteStatusesEnum: string
{
    case CREATED = 'created';
    case BUILDING = 'building';
    case ACTIVE = 'active';
    case DEPLOYING = 'deploying';
    case DEPLOYING_FAILED = 'deploying-failed';
    case SUSPENDED = 'suspended';
    case REPOSITORY_INSTALLING = 'repository-installing';
    case REPOSITORY_UNINSTALLING = 'repository-uninstalling';
    case WORDPRESS_INSTALLING = 'wordpress-installing';
    case WORDPRESS_UNINSTALLING = 'wordpress-uninstalling';
    case NEXTCLOUD_INSTALLING = 'nextcloud-installing';
    case NEXTCLOUD_UNINSTALLING = 'nextcloud-uninstalling';
    case STATAMIC_INSTALLING = 'static-installing';
    case STATAMIC_UNINSTALLING = 'static-uninstalling';
    case OCTOBERCMS_INSTALLING = 'octobercms-installing';
    case OCTOBERCMS_UNINSTALLING = 'octobercms-uninstalling';
    case CLONE_IN_PROGRESS = 'clone-in-progress';
    case STAGING_PRODUCTION_SYNCING = 'staging-production-syncing';
    case DELETING = 'deleting';
}
