<?php

use Http\controllers\articles\Article;
use Http\Forms\ArticleForm;

$form = ArticleForm::validate($_REQUEST);

$model = new Article();
$model->update($_REQUEST['id'] ?? 0, $_REQUEST );
echo json_encode([
    'status' => 200,
    'message' => 'The article updated successfully'
]);

exit;
