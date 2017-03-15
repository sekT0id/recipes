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
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recipes}}';
    }

    /**
     * Relation function
     *
     * @return ActiveRecord object
     */
    public function get()
    {
        return $this->hasMany(Parts::className(), ['pump_id' => 'id']);
    }
}
