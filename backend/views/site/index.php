<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <h1>небольшая справка по работе с рецептами!</h1>

        <div class="row">
            <div class="col-xs-12">
                <h2>Шаг 1</h2>
                <p>Добавьте ингредиенты в систему, воспользовавшись интерфейсом <?php echo Html::a('Ингредиенты', Url::toRoute('/ingredients'));?>.</p>
            </div>
            <div class="col-xs-12">
                <h2>Шаг 2</h2>
                <p>Добавьте рецепты в систему, воспользовавшись интерфейсом <?php echo Html::a('Рецепты', Url::toRoute('/recipes'));?>.</p>
            </div>
            <div class="col-xs-12">
                <h2>Шаг 3</h2>
                <p>Наполните рецепты ингредиентами, через интерфейс редактирования рецепта.</p>
            </div>
            <div class="col-xs-12">
                <h2>Готово</h2>
                <p>Теперь на сайте можно искать Ваши рецепты!</p>
            </div>
        </div>

    </div>
</div>
