<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200618_122429_type_create
 */
class m200618_122429_type_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('type', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('type');
    }
}
