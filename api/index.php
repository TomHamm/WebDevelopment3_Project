<?php
require 'Slim/Slim.php';
require 'database.php';
require 'db.php';
require 'car_db.php';
use Slim\Slim;
\Slim\Slim::registerAutoLoader();

$app = new Slim();
$app->get('/cars', 'getCars');
$app->get('/users', 'getUsers');
$app->get('/vans', 'getVans');
$app->get('/cars/:id', 'getCarById');
$app->get('/vans/:id', 'getVanById');
$app->get('/users/:id', 'getUserById');
//$app->get('/cars/search/:query', 'getCarByReg');
$app->post('/cars', 'addCar');
$app->post('/vans', 'addVan');
$app->put('/cars/:id', 'updateCar');
$app->put('/vans/:id', 'updateVan');
$app->delete('/cars/:id', 'deleteCar');
$app->delete('/vans/:id', 'deleteVan');
$app->delete('/users/:id', 'deleteUser');
$app->run();
?>