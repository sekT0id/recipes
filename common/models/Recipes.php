<?php

namespace common\models;

/**
 * Recipes model
 *
 * @property integer $id
 * @property string $name
 */
class Recipes extends \common\baseComponents\BaseModel
{
    /**
     * Показатель активности записи.
     * Если статус записи ниже данного показателя,
     * То считаем рецепт скрытым.
     */
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recipes}}';
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
        return $this->hasMany(RecipesData::className(), ['recipeId' => 'id']);
    }
}
