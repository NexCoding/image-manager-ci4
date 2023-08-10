<?php

declare(strict_types=1);

namespace NexCoding\ImageManagerCi4\Config;

use Config\Services as BaseService;
use \NexCoding\ImageManagerCi4\ImageManager;
class Services extends BaseService
{
    /**
     * The base auth class
     */
    public static function image_manager_ci4(bool $getShared = true)
    {
        if ($getShared) {
            return self::getSharedInstance('image_manager_ci4');
        }

        return new ImageManager();
    }

}
