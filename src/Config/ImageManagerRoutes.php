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
                'post',
                'upload',
                'ManagerImagesController::upload',
            ],
        ],
        
    ];
}
