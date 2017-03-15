<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RecipesData */

$this->title = 'Update Recipes Data: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipes-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
