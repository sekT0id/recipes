<?php
namespace common\models;

/**
 * Recipes model
 *
 * @property integer $id
 * @property string $name
 */
class RecipesData extends \common\baseComponents\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recipes_data}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => '#',
            'recipeId'     => 'Рецепт',
            'ingredientId' => 'Ингредиент',
        ];
    }

    /**
     * Relation function
     *
     * @return ActiveRecord object
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ingredientId']);
    }

    /**
     * Relation function
     *
     * @return ActiveRecord object
     */
    public function getRecipe()
    {
        return $this->hasOne(Recipes::className(), ['id' => 'recipeId']);
    }
}
