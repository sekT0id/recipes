<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h2>Поиск рецептов</h2>

                <p></p>

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?php echo $form
                    ->field($model, 'ingredientOne')
                    ->dropDownList($ingredients, ['prompt' => '-- Ингридиент 1 --'])
                    ->label(false);?>

                <?php echo $form
                    ->field($model, 'ingredientTwo')
                    ->dropDownList($ingredients, ['prompt' => '-- Ингридиент 2 --'])
                    ->label(false);?>

                <?php echo $form
                    ->field($model, 'ingredientThree')
                    ->dropDownList($ingredients, ['prompt' => '-- Ингридиент 3 --'])
                    ->label(false);?>

                <?php echo $form
                    ->field($model, 'ingredientFour')
                    ->dropDownList($ingredients, ['prompt' => '-- Ингридиент 4 --'])
                    ->label(false);?>

                <?php echo $form
                    ->field($model, 'ingredientFive')
                    ->dropDownList($ingredients, ['prompt' => '-- Ингридиент 5 --'])
                    ->label(false);?>

                <div class="form-group">
                    <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>
</div>
