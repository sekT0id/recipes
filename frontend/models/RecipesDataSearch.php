<?php
namespace frontend\models;

use yii\helpers\ArrayHelper;

use yii\data\ActiveDataProvider;

use codeonyii\yii2validators\AtLeastValidator;

use common\models\Recipes;
use common\models\RecipesData;

/**
 * Frontend IngredientsSearch model
 */
class RecipesDataSearch extends \common\models\RecipesData
{
    /**
     * Минимум заполненых полей.
     */
    const AT_LEAST = 2;

    /**
     * Поля формы.
     */
    public $ingredientOne   = null;
    public $ingredientTwo   = null;
    public $ingredientThree = null;
    public $ingredientFour  = null;
    public $ingredientFive  = null;

    /**
     * Количество вхождений ингридиентов в рецепт.
     */
    public $entranceCount = null;

    /**
     * Минимальное количество вхождения ингридиентов в рецепт.
     */
    public $minEntranceCount = 2;

    /**
     * Сюда будут складываться id искомых ингридиентов
     */
    public $searchedIngredientsId = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['ingredientOne', 'ingredientTwo', 'ingredientThree', 'ingredientFour', 'ingredientFive'],
                AtLeastValidator::className(),
                'in' => ['ingredientOne', 'ingredientTwo', 'ingredientThree', 'ingredientFour', 'ingredientFive'],
                'min' => self::AT_LEAST,
                'message' => 'Выберите больше ингредиентов',
            ],
        ];
    }

    /**
     * Ищем рецепты по заданным ингредиентам ($params)
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $this->load($params);

        if ($this->validate()) {

            $this->setSearchedIngredientsId($params);

            return self::find()->joinWith('recipe')
                ->select(['recipeId', 'entranceCount' => 'COUNT(*)'])
                ->where([self::tableName() . '.ingredientId' => $this->searchedIngredientsId])
                ->andWhere(['>=', Recipes::tableName() . '.status', Recipes::STATUS_ACTIVE])
                ->groupBy(['recipeId'])
                ->having(['>=', 'entranceCount', $this->minEntranceCount])
                ->orderBy(['entranceCount' => SORT_DESC])
                ->all();
        }
        return null;
    }

    /**
     * Заполняем $this->searchedIngredientsId id искомых ингредиентов.
     */
    private function setSearchedIngredientsId($fields = null)
    {
        if ($fields !== null) {
            foreach ($fields[$this->formName()] as $field => $value) {
                if ($value != null) {
                    array_push($this->searchedIngredientsId, $value);
                }
            }
        }
    }
}
