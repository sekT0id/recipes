<?php

namespace backend\models;

use common\models\RecipesData as CommonRecipesData;

/**
 * Backend Recipes model
 */
class RecipesData extends CommonRecipesData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipeId', 'ingredientId'], 'required'],
            [['recipeId', 'ingredientId'], 'integer'],
        ];
    }
}
