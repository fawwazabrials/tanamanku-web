<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login','LoginController::index');
$routes->get('/','Dashboard::index');
$routes->post('/login_action','LoginController::login_action');
$routes->get('/logout','LoginController::logout');
$routes->get('/plants','Plants::index');
$routes->get('/plants/(:num)','Plants::detail/$1');
$routes->get('/plant/create','Plants::create');
$routes->post('/plant/save','Plants::save');
$routes->delete('/plant/delete/(:num)','Plants::delete/$1');
$routes->get('/plant/edit/(:num)','Plants::edit/$1');
$routes->put('/plant/update/(:num)','Plants::update/$1');
$routes->put('/plant/generateSensorData/(:num)','Plants::generateSensorData/$1');
$routes->get('/requests','Requests::index');
$routes->put('/requests/accept/(:num)','Requests::accept/$1');
$routes->put('/requests/reject/(:num)','Requests::reject/$1');
$routes->delete('/requests/delete/(:num)','Requests::delete/$1');
$routes->get('/TanamankuAPI/plants/(:segment)/(:segment)','TanamankuAPI::plants/$1/$2');
$routes->get('/TanamankuAPI/plants/(:segment)/(:segment)/(:num)','TanamankuAPI::plant/$3/$1/$2');
$routes->post('/TanamankuAPI/requests/(:segment)/(:segment)','TanamankuAPI::postRequests/$1/$2');
