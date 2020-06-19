<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200618_123488_task_create
 */
class m200618_123488_task_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => Schema::TYPE_PK,
            'type_id' => Schema::TYPE_INTEGER,
            'status_id' => Schema::TYPE_INTEGER,
            'description' => Schema::TYPE_TEXT,
            'date_start' => Schema::TYPE_INTEGER,
            'date_end' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER
        ]);

        $this->addForeignKey(
            'fk-task-type_id',
            'task',
            'type_id',
            'type',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-task-status_id',
            'task',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-task-type_id', 'task');
        $this->dropForeignKey('fk-task-status_id', 'task');

        $this->dropTable('task');
    }
}
