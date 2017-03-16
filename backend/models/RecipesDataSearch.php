<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RecipesData;

/**
 * RecipesDataSearch represents the model behind the search form about `common\models\RecipesData`.
 */
class RecipesDataSearch extends RecipesData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'recipeId', 'ingredientId'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = RecipesData::find();

        // add conditions that should always apply here

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
            'id' => $this->id,
            'recipeId' => $this->recipeId,
            'ingredientId' => $this->ingredientId,
        ]);

        return $dataProvider;
    }
}
