<?php

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

use backend\widgets\ExModal;
?>

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

    <?php $form = ActiveForm::begin([
    ]);?>
        <?php echo $form
            ->field($model, 'ingredientId')
            ->dropDownList($units);?>

        <?php echo $form
            ->field($modelData, 'recipeId')
            ->hiddenInput(['value' => $model->id])
            ->label(false);?>

    <?php ActiveForm::end(); ?>
<?php ExModal::end();?>

<?php if ($model && $model->data) :?>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Наименование</th>
        </thead>
        <tbody>
            <?php foreach ($model->data as $item) :?>
                <td><?php echo $item->id;?></td>
                <td><?php echo $item->name;?></td>
            <?php endforeach;?>
        </tbody>
    </table>

<?php else:?>
    <p>В Вашем рецепте ещё нет ингридиентов</p>
<?php endif;?>
