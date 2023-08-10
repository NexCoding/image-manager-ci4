<?php

// $routes = Services::routes();

// $routes->group('manager-images', ['namespace' => 'NexCoding\ImageManagerCi4\Controllers'], function($routes) {
//     $routes->get('/', 'ManagerImagesController::index');
//     $routes->post('/upload', 'ManagerImagesController::upload');
// });


declare(strict_types=1);

namespace NexCoding\ImageManagerCi4\Config;

use CodeIgniter\Config\BaseConfig;

class Routes extends BaseConfig
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
