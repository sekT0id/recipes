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
    const STATUS_ACTIVE = 1;
    const STATUS_HIDDEN = 0;

    const SCENARIO_SET_STATUS = 'setStatus';

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

            [['status'], 'required', 'on' => self::SCENARIO_SET_STATUS],
            [['status'], 'integer',  'on' => self::SCENARIO_SET_STATUS],
        ];
    }

    public function setActiveStatus()
    {
        if ($this->status == self::STATUS_HIDDEN) {
            $this->status = self::STATUS_ACTIVE;
            return true;
        }
        return false;
    }

    public function setHiddenStatus()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            $this->status = self::STATUS_HIDDEN;
            return true;
        }
        return false;
    }
}
