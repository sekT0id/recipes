<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Recipes */

$this->title = 'Создать рецепт';
$this->params['breadcrumbs'][] = ['label' => 'Рецепты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
