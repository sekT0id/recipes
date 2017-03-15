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
}
