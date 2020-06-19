<?php

namespace app\models\entities;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class Status
 *
 * @property string $name
 */
class Status extends ActiveRecord
{
    /**
     * @return array|null
     */
    public static function getStatuses(): ?array
    {
        $statuses = Status::find()->asArray()->all();

        if (!empty($statuses)) {
            return ArrayHelper::map($statuses, 'id', 'name');;
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return string|null
     */
    public static function getStatus(int $id): ?string
    {
        $status = Status::findOne($id);

        if (!empty($status)) {
            return (string)$status->name;
        }

        return null;
    }
}
