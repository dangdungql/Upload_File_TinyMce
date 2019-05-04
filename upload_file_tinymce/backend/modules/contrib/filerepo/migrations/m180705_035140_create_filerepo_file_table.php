<?php

use yii\db\Migration;

/**
 * Handles the creation of table `filerepo_file`.
 */
class m180705_035140_create_filerepo_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('filerepo_file', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'description' => $this->text(),
            'path' => $this->string(),
            'role' => $this->string(),
            'created_by' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'type' => $this->string(),
            'folder' => $this->string(),
            'status' => $this->integer()->defaultValue(0),
            'owner_id' => $this->integer(),
            'data' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('filerepo_file');
    }
}
