<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'composer/vendor/autoload.php';
require 'class/AccesoDatos.php';
require 'class/empleadoApi.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);


$app->group('/emp', function () {
 
  $this->get('/', \empleadoApi::class . ':traerTodos');
 
  $this->get('/{id}', \empleadoApi::class . ':traerUno');

  $this->post('/', \empleadoApi::class . ':CargarUno');

  $this->delete('/', \empleadoApi::class . ':BorrarUno');

  $this->put('/', \empleadoApi::class . ':ModificarUno');
     
});

$app->run();