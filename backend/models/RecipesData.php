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

    /**
     * Удалить всю информацию о рецепте.
     */
    public static function deleteRecipe($id)
    {
        self::deleteAll(['recipeId' => $id]);
    }

    /**
     * Удалить всю информацию об ингридиенте.
     */
    public static function deleteIngredient($id)
    {
        self::deleteAll(['ingredientId' => $id]);
    }
}
