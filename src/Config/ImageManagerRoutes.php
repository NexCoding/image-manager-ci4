<?php

declare(strict_types=1);

namespace NexCoding\ImageManagerCi4\Config;

use CodeIgniter\Config\BaseConfig;

class ImageManagerRoutes extends BaseConfig
{
    public array $routes = [
        'manager-images' => [
            [
                'get',
                'list_images',
                'ManagerImagesController::index',
                'list-images', // Route name
            ],
            [
                'get',
                'select_one',
                'ManagerImagesController::selectOne',
            ],
            [
                'get',
                'select_multi',
                'ManagerImagesController::selectMulti',
            ],
            [
                'post',
                'upload',
                'ManagerImagesController::upload',
            ],
            [
                'get',
                'ajax_media/(:num)',
                'ManagerImagesController::ajax_media/$1',
            ],
        ],
        
    ];
}
