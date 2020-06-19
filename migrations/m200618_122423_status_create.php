<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200618_122423_status_create
 */
class m200618_122423_status_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}
