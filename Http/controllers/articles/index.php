<?php

use Http\controllers\articles\Article;

$model = new Article();
$rows = $model->index();

echo json_encode([
    'status' => 200,
    'articles' => $rows
]);

exit;

