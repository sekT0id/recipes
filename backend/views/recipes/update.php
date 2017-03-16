<?php

use yii\helpers\Html;

use common\widgets\Alert;

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Recipes */

$this->title = 'Изменить рецепт: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Рецепты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="recipes-update">

    <h1><?php echo Html::encode($this->title);?></h1>

    <?php echo Alert::widget();?>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]);?>

    <?php echo $this->render('/recipes-data/index', [
        'model'       => $model,
        'modelData'   => $modelData,
        'ingredients' => $ingredients,
    ]);?>

</div>
