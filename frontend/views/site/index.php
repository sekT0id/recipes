<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$fullEntrance = null;
?>

<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <h2>Поиск рецептов</h2>

                <p>Выберите как минимум два ингридиента для начала поиска</p>

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
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">

                <?php if ($searchModel) :?>

                    <p>Результаты поиска:</p>

                    <?php foreach ($searchModel as $item) :?>
                        <?php
                            $difference = array_diff(
                                $model->searchedIngredientsId,
                                ArrayHelper::getColumn($item->recipe->ingredients, 'id')
                            );

                            // Если найдено полное вхождение поиска в результат.
                            if (count($difference) == 0 and $fullEntrance === null) $fullEntrance = true;
                            // Как только пошли не полные вхождения, обрываем цикл.
                            if (count($difference) > 0 and $fullEntrance !== null) break;
                        ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>
                                    <?php echo $item->recipe->name;?>
                                </strong>
                            </div>
                            <div class="panel-body">
                                <?php foreach ($item->recipe->ingredients as $ingredient) :?>

                                    <?php if (in_array($ingredient->id, $model->searchedIngredientsId)) :?>
                                        <p><strong><?php echo $ingredient->name;?></strong></p>
                                    <?php else :?>
                                        <p><?php echo $ingredient->name;?></p>
                                    <?php endif;?>

                                <?php endforeach;?>
                            </div>
                        </div>

                    <?php endforeach;?>

                <?php else :?>

                    <p class="text-center">Ничего не найдено</p>

                <?php endif;?>

            </div>
        </div>

    </div>
</div>
