<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filerepo_ref`.
 */
class m180705_040142_create_filerepo_ref_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filerepo_ref', [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer(),
            'object_id' => $this->integer(),
            'object_type' => $this->string(),
            'status' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('filerepo_ref');
    }
}
