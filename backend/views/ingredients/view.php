<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ingredients */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ингредиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

<?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name:ntext',
        'status',
    ],
]);?>
