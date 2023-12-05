<?php

use yii\db\Migration;

/**
 * Class m231205_154701_add_index_to_history_table
 */
class m231205_154701_add_index_to_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-history-ins_ts', '{{%history}}', 'ins_ts');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-history-ins_ts', '{{%history}}');
    }
}
