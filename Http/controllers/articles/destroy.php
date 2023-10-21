<?php

use Http\controllers\articles\Article;

if ( !isset( $_REQUEST['id'] ) ) abort("The id parameter is required");

$model = new Article();
$model->destroy( $_REQUEST['id'] );

echo json_encode([
    'status' => 200,
    'message' => 'The article deleted successfully'
]);

exit;