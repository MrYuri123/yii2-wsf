<?php

use app\models\entities\Type;
use yii\db\Migration;

/**
 * Class m200618_134404_type_seeder
 */
class m200618_134404_type_seeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $entity = new Type();
        $entity->name = 'First';
        $entity->save();

        $entity = new Type();
        $entity->name = 'Second';
        $entity->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('type');
    }
}
