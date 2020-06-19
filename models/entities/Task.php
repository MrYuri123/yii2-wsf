<?php

namespace app\models\entities;

use Cassandra\Date;
use DateTime;
use yii\db\ActiveRecord;

/**
 * Class Status
 *
 * @property integer $type_id
 * @property integer $status_id
 * @property string $description
 * @property integer $date_start
 * @property integer $date_end
 * @property integer $created_at
 */
class Task extends ActiveRecord
{
    public function rules()
    {
        return [
            [['type_id', 'status_id', 'date_start', 'date_end', 'description'], 'required'],
            [['type_id', 'status_id', 'created_at'], 'integer'],
            [['date_end'], 'dateEndValidation'],
            ['description', 'string', 'max' => 2000],
        ];
    }

    public function dateEndValidation($attribute, $params, $validator)
    {
        if ($this->date_start >= $this->date_end) {
            $this->addError($attribute, 'Worng start date');
        }
    }
}
