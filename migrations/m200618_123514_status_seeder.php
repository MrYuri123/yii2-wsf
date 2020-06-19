<?php

use app\models\entities\Status;
use yii\db\Migration;

/**
 * Class m200618_123514_status_seeder
 */
class m200618_123514_status_seeder extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $entity = new Status();
        $entity->name = 'Open';
        $entity->save();

        $entity = new Status();
        $entity->name = 'Closed';
        $entity->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('status');
    }
}
