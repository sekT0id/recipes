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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
            [['name'], 'unique'],
        ];
    }
}
