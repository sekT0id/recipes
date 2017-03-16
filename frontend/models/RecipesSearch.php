<?php
namespace frontend\models;

use yii\data\ActiveDataProvider;

use codeonyii\yii2validators\AtLeastValidator;

/**
 * Frontend IngredientsSearch model
 */
class RecipesSearch extends \common\models\Recipes
{
    const AT_LEAST = 2;

    public $ingredientOne   = null;
    public $ingredientTwo   = null;
    public $ingredientThree = null;
    public $ingredientFour  = null;
    public $ingredientFive  = null;

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
                'message' => 'Для поиска необходимо выбрать как минимум два ингридиента',
            ],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find()->with('data.ingredients');;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            ['>=', 'status', self::STATUS_ACTIVE],
            []
        ]);
        //$query->joinWith(['data' =>

        return $dataProvider;
    }

    /**
     * Получить id рецептов с данным ингридиентом
     *
     * @return array of id's
     */
    public function getRecipes()
    {
        return ArrayHelper::getColumn($this->data, 'recipeId');
    }
}
