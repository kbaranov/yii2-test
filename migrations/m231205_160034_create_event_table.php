<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m231205_160034_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'strategy' => $this->string()->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%event}}', ['id', 'name', 'title', 'strategy'], [
            [1, 'created_task', 'Task created', 'task'],
            [2, 'updated_task', 'Task updated', 'task'],
            [3, 'completed_task', 'Task completed', 'task'],
            [4, 'incoming_sms', 'Incoming message', 'sms'],
            [5, 'outgoing_sms', 'Outgoing message', 'sms'],
            [6, 'incoming_call', 'Incoming call', 'call'],
            [7, 'outgoing_call', 'Outgoing call', 'call'],
            [8, 'incoming_fax', 'Incoming fax', 'fax'],
            [9, 'outgoing_fax', 'Outgoing fax', 'fax'],
            [10, 'customer_change_type', 'Type changed', 'customer_type'],
            [11, 'customer_change_quality', 'Property changed', 'customer_quality'],
        ]);

        $this->addColumn('{{%history}}', 'event_id', $this->integer()->notNull()->after('event'));

        $this->update('{{%history}}', ['event_id' => 1], ['event' => 'created_task']);
        $this->update('{{%history}}', ['event_id' => 2], ['event' => 'updated_task']);
        $this->update('{{%history}}', ['event_id' => 3], ['event' => 'completed_task']);
        $this->update('{{%history}}', ['event_id' => 4], ['event' => 'incoming_sms']);
        $this->update('{{%history}}', ['event_id' => 5], ['event' => 'outgoing_sms']);
        $this->update('{{%history}}', ['event_id' => 6], ['event' => 'incoming_call']);
        $this->update('{{%history}}', ['event_id' => 7], ['event' => 'outgoing_call']);
        $this->update('{{%history}}', ['event_id' => 8], ['event' => 'incoming_fax']);
        $this->update('{{%history}}', ['event_id' => 9], ['event' => 'outgoing_fax']);
        $this->update('{{%history}}', ['event_id' => 10], ['event' => 'customer_change_type']);
        $this->update('{{%history}}', ['event_id' => 11], ['event' => 'customer_change_quality']);

        $this->addForeignKey('fk_history__event_id', '{{%history}}', 'event_id', 'event', 'id', 'RESTRICT', 'CASCADE');

        $this->dropColumn('{{%history}}', 'event');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%history}}', 'event', $this->string()->notNull()->after('event_id'));

        $this->update('{{%history}}', ['event' => 'created_task'], ['event_id' => 1]);
        $this->update('{{%history}}', ['event' => 'updated_task'], ['event_id' => 2]);
        $this->update('{{%history}}', ['event' => 'completed_task'], ['event_id' => 3]);
        $this->update('{{%history}}', ['event' => 'incoming_sms'], ['event_id' => 4]);
        $this->update('{{%history}}', ['event' => 'outgoing_sms'], ['event_id' => 5]);
        $this->update('{{%history}}', ['event' => 'incoming_call'], ['event_id' => 6]);
        $this->update('{{%history}}', ['event' => 'outgoing_call'], ['event_id' => 7]);
        $this->update('{{%history}}', ['event' => 'incoming_fax'], ['event_id' => 8]);
        $this->update('{{%history}}', ['event' => 'outgoing_fax'], ['event_id' => 9]);
        $this->update('{{%history}}', ['event' => 'customer_change_type'], ['event_id' => 10]);
        $this->update('{{%history}}', ['event' => 'customer_change_quality'], ['event_id' => 11]);

        $this->dropForeignKey('fk_history__event_id', '{{%history}}');

        $this->dropColumn('{{%history}}', 'event_id');

        $this->dropTable('{{%event}}');
    }
}
