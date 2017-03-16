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
     * Дополнительный сценарий валидации для
     * изменения статуса рецепта.
     */
    const SCENARIO_SET_STATUS = 'setStatus';

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

            [['status'], 'required', 'on' => self::SCENARIO_SET_STATUS],
            [['status'], 'integer',  'on' => self::SCENARIO_SET_STATUS],
        ];
    }

    /**
     * Понизить статус рецепта
     *
     * @var records int/array of id's
     */
    public static function reduceStatus($records = null)
    {
        if ($records !== null) {
            return self::updateAllCounters(['status' => -1], ['id' => $records]);
        }
        return null;
    }

    /**
     * Повысить статус рецепта
     *
     * @var records int/array of id's
     */
    public static function increaseStatus($records = null)
    {
        if ($records !== null) {
            return self::updateAllCounters(['status' => 1], ['id' => $records]);
        }
        return null;
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
