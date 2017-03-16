<?php

use yii\helpers\Url;
use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

use backend\widgets\ExModal;
?>

<div class="ingredients-list">

    <h2>Детали рецепта</h2>

    <?php $form = ActiveForm::begin([
        'action' => '/recipes-data/create'
    ]);?>

        <?php ExModal::begin([
            'header' => '<h4 class="modal-title" id="myModalLabel">Новый ингридиент</h4>',
            'footer' => [
                Html::button('Добавить', [
                    'type' => 'submit',
                    'class' => 'btn btn-raised btn-success'
                ]),
                Html::button('Отмена', [
                    'data-dismiss' => 'modal',
                    'class' => 'btn btn-raised btn-warning'
                ]),
            ],
            'toggleButton' => [
                'label' => 'Добавить ингридиент',
                'class' => 'btn btn-raised btn-primary',
            ],
        ]);?>

            <?php echo $form
                ->field($modelData, 'ingredientId')
                ->dropDownList($ingredients);?>

            <?php echo $form
                ->field($modelData, 'recipeId')
                ->hiddenInput(['value' => $model->id])
                ->label(false);?>

        <?php ExModal::end();?>
    <?php ActiveForm::end(); ?>

    <?php if ($model && $model->data) :?>

        <table class="table">
            <thead>
                <th>#</th>
                <th>Наименование</th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($model->data as $item) :?>
                    <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $item->ingredient->name;?></td>
                        <td>
                            <?php echo Html::a(
                                'Изменить',
                                ['recipes-data/update', 'id' => $item->id]
                            );?>
                        </td>
                        <td>
                            <?php echo Html::a(
                                'Удалить',
                                ['recipes-data/delete', 'id' => $item->id],
                                [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Вы точно хотите удалить элемент?',
                                        'method' => 'post',
                                    ],
                                ]
                            );?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

    <?php else :?>

        <p>В Вашем рецепте ещё нет ингридиентов</p>

    <?php endif;?>

</div>
