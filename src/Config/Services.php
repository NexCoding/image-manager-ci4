<?php

declare(strict_types=1);

namespace NexCoding\ImageManagerCi4\Config;

use App\Config\Services as BaseService;

class Services extends BaseService
{
    /**
     * The base auth class
     */
    public static function image_manager_ci4(bool $getShared = true): Auth
    {
        if ($getShared) {
            return self::getSharedInstance('ImageManagerCi4');
        }

        return new ImageManagerCi4();
    }

    //service('image_manager_ci4')->routes($routes);


}
