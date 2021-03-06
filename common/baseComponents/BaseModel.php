<?php

namespace common\baseComponents;

use yii\helpers\ArrayHelper;

/**
 * This is the BaseModel class.
 */
class BaseModel extends \yii\db\ActiveRecord
{
    /**
     * Получить готовый набор данных
     * для отображении в элементе формы dropDownList
     *
     * @return AR object
     */
    public static function getDropDownListItems()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
