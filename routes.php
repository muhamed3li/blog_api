<?php

$router->post('/api/login', 'login/index.php');
$router->get('/api/articles', 'articles/index.php')->only('auth');
$router->post('/api/articles', 'articles/store.php')->only('auth');
$router->get('/api/articles/show', 'articles/show.php')->only('auth');
$router->put('/api/articles/update', 'articles/update.php')->only('auth');
$router->delete('/api/articles/destroy', 'articles/destroy.php')->only('auth');