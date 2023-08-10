<?php namespace NexCoding\ImageManagerCi4\Config;

$routes = Services::routes();

$routes->group('manager-images', ['namespace' => 'NexCoding\ImageManagerCi4\Controllers'], function($routes) {
    $routes->get('/', 'ManagerImagesController::index');
    $routes->post('/upload', 'ManagerImagesController::upload');
});
