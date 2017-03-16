<?php

namespace app\models;

use common\models\Recipes as CommonRecipes;

/**
 * Backend Recipes model
 */
class Recipes extends CommonRecipes
{
    /**
     * Дополнительный сценарий валидации для
     * изменения статуса рецепта.
     */
    const SCENARIO_SET_STATUS = 'setStatus';

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
}
