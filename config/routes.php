<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');


Router::scope('/', function ($routes) {

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->fallbacks('DashedRoute');

});



Router::scope('/api', function ($routes) {
    $routes->extensions(['json', 'xml']);
});


// for api extensions
Router::scope('/api', function ($routes) {
    $routes->extensions(['json', 'xml', 'html']);
    $routes->connect(
        '/:id',
        ['controller' => 'Users', 'action' => 'view'],
        [
            'pass' => ['id']
        ]
    );
});

/*

Router::connect('plugins/*'); 

Plugin::loadAll([
    'Blog' => ['routes' => true],
    'ContactManager' => ['bootstrap' => true],
    'WebmasterTools' => ['bootstrap' => true, 'routes' => true],
]);

Router::mapResources('users');
Router::parseExtensions();
*/