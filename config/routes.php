<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/register', ['controller' => 'Users', 'action' => 'register']);
        $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        
        // Add categories route
        $builder->connect('/categories', ['controller' => 'Categories', 'action' => 'index']);

        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });
};
