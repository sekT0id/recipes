<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IngredientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ингредиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ингредиент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin();?>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'name:ntext',
                [
                    'attribute' => 'status',
                    'label' => 'Статус',
                    'format' => 'text',
                    'content' => function ($model) {
                        $status = '';
                        $title = '';
                        if ($model->status == $model::STATUS_ACTIVE) {
                            $title = 'Скрыть';
                            $status = 'hidden';
                        } else {
                            $title = 'Показать';
                            $status = 'active';
                        }
                        return Html::a($title, ['set-' . $status . '-status', 'id' => $model->id]);
                    },
                    'contentOptions' => [
                        'class' => 'text-center',
                    ],
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);?>
    <?php Pjax::end();?>
</div>
