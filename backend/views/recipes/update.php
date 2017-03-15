<?php

use yii\helpers\Html;

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Recipes */

$this->title = 'Изменить рецепт: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Рецепты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="recipes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <h2>Детали рецепта</h2>

    <?php Pjax::begin();?>
        <?php echo $this->render('/recipesData/index', [
            'model' => $model,
            'modelData' => $modelData,
        ]) ?>
    <?php Pjax::end(); ?>

</div>
