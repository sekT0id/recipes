<?php
namespace common\models;

/**
 * Ingredients model
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class Ingredients extends \common\baseComponents\BaseModel
{
    /**
     * Показатель активности записи.
     * Соответственно активный и скрытый
     */
    const STATUS_ACTIVE = 1;
    const STATUS_HIDDEN = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ingredients}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'     => '#',
            'name'   => 'Наименование',
            'status' => 'Видимость',
        ];
    }

    /**
     * Relation function
     *
     * @return ActiveRecord object
     */
    public function getData()
    {
        return $this->hasMany(RecipesData::className(), ['ingredientId' => 'id']);
    }

    /**
     * Relation function
     *
     * @return ActiveRecord object
     */
    public function getRecipes()
    {
        return $this
            ->hasMany(Recipes::className(), ['id' => 'recipeId'])
            ->viaTable(RecipesData::tableName(), ['ingredientId' => 'id']);
    }
}
