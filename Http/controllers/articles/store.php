<?php

use Http\controllers\articles\Article;
use Http\Forms\ArticleForm;

$form = ArticleForm::validate($_REQUEST);

$model = new Article();
$model->store( $_REQUEST );
echo json_encode([
    'status' => 200,
    'message' => 'The article created successfully'
]);

exit;
