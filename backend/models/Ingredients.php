<?php

namespace backend\models;

use common\models\Ingredients as CommonIngredients;

/**
 * Backend Ingredients model
 */
class Ingredients extends CommonIngredients
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
     * Установить статус активности для записи
     *
     * @return boolean
     */
    public function setActiveStatus()
    {
        if ($this->status == self::STATUS_HIDDEN) {
            $this->status = self::STATUS_ACTIVE;
            return true;
        }
        return false;
    }

    /**
     * Установить скрытый статус для записи
     *
     * @return boolean
     */
    public function setHiddenStatus()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            $this->status = self::STATUS_HIDDEN;
            return true;
        }
        return false;
    }

    /**
     * Получить id рецептов с данным ингридиентом
     *
     * @return array of id's
     */
    public function getRecipes()
    {
        return ArrayHelper::getColumn($this->data, 'recipeId');
    }
}
