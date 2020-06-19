<?php

namespace app\models\entities;

use yii\helpers\ArrayHelper;

/**
 * Class Type
 *
 * @property string $name
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @return array|null
     */
    public static function getTypes()
    {
        $types = Type::find()->asArray()->all();

        if (!empty($types)) {
              return ArrayHelper::map($types, 'id', 'name');;
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return string|null
     */
    public static function getType(int $id): ?string
    {
        $type = Type::findOne($id);

        if (!empty($type)) {
            return (string)$type->name;
        }

        return null;
    }
}
