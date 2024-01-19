<?php

namespace Config;
use App\Controllers\RestPersonas;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

 $routes->setDefaultNamespace('App\Controllers'); // Establece el espacio de nombres predeterminado para los controladores.
 $routes->setDefaultController('Crud'); // Establece el controlador predeterminado.
 $routes->setDefaultMethod('index'); // Establece el método predeterminado del controlador predeterminado.
 $routes->setTranslateURIDashes(false); // Desactiva la traducción de guiones en las URI.
 $routes->set404Override(); // Habilita la sobrescritura de la página de error 404.
 $routes->setAutoRoute(true); // Habilita la generación automática de rutas según los métodos del controlador.


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Ruta para la página principal, que carga el método index del controlador Crud
$routes->get('/', 'Crud::index');

// Ruta para obtener un nombre específico por ID
$routes->get('/obtenerNombre/(:any)', 'Crud::obtenerNombre/$1');

// Ruta para eliminar un registro por ID
$routes->get('/eliminar/(:any)', 'Crud::eliminar/$1');

// Ruta para crear un nuevo registro (se utiliza el método POST)
$routes->post('/crear', 'Crud::crear');

// Ruta para actualizar un registro (se utiliza el método POST)
$routes->post('/actualizar', 'Crud::actualizar');

// Rutas de recursos para el controlador RestPersonas (API REST)
$routes->resource('rest-personas', ['controller' => 'RestPersonas']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
