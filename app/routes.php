 <?php

$router->get('', 'TaskController@index');
$router->get('task/create', 'TaskController@create');
$router->post('task/store', 'TaskController@store');
$router->get('task/update', 'TaskController@change');
$router->post('task/update', 'TaskController@update');
$router->get('task/delete', 'TaskController@delete');

$router->get('autorization', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');

$router->get('page-not-found', 'TaskController@page404');