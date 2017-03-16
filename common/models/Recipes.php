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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
            [['name'], 'unique'],

            [['status'], 'required'],
            [['status'], 'integer'],
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
