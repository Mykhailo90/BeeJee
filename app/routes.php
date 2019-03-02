 <?php

$router->get('', 'TaskController@index');
$router->get('task/create', 'TaskController@create');
$router->post('task/store', 'TaskController@store');

$router->get('autorization', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');