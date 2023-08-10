<?php 

declare(strict_types=1);

namespace NexCoding\ImageManagerCi4;

use CodeIgniter\Router\RouteCollection;

class ImageManagerCi4 {

    public function routes(RouteCollection &$routes, array $config = []): void
    {
        $authRoutes = config('AuthRoutes')->routes;

        $routes->group('/', ['namespace' => 'NexCoding\ImageManagerCi4\Controllers'], static function (RouteCollection $routes) use ($authRoutes, $config): void {
            foreach ($authRoutes as $name => $row) {
                if (! isset($config['except']) || ! in_array($name, $config['except'], true)) {
                    foreach ($row as $params) {
                        $options = isset($params[3])
                            ? ['as' => $params[3]]
                            : null;
                        $routes->{$params[0]}($params[1], $params[2], $options);
                    }
                }
            }
        });
    }
}