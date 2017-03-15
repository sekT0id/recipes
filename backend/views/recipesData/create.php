<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RecipesData */

$this->title = 'Create Recipes Data';
$this->params['breadcrumbs'][] = ['label' => 'Recipes Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
