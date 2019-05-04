<?php

use yii\db\Migration;

/**
 * Class m180807_185719_crate_v_filerepo_ref_view
 */
class m180807_185719_crate_v_filerepo_ref_view extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        CREATE VIEW v_filerepo_ref as SELECT filerepo_ref.id,
            filerepo_ref.file_id,
            filerepo_ref.object_id AS ref_object_id,
            filerepo_ref.object_type AS ref_object_type,
            filerepo_ref.status AS ref_status,
            filerepo_ref.created_at AS ref_created_at,
            filerepo_file.name AS file_name,
            filerepo_file.slug AS file_slug,
            filerepo_file.description AS file_description,
            filerepo_file.path AS file_path,
            filerepo_file.role AS file_role,
            filerepo_file.created_by AS file_created_by,
            filerepo_file.created_at AS file_created_at,
            filerepo_file.updated_at AS file_updated_at,
            filerepo_file.type AS file_type,
            filerepo_file.data AS file_data,
            filerepo_file.status AS file_status,
            filerepo_file.owner_id AS file_owner_id,
            filerepo_file.folder AS file_folder,
            ((((filerepo_file.name)::text || ' ('::text) || filerepo_file.created_at) || ')'::text) as file_text
       FROM (filerepo_file
            JOIN filerepo_ref ON ((filerepo_ref.file_id = filerepo_file.id)));
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180807_185719_crate_v_filerepo_ref_view cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180807_185719_crate_v_filerepo_ref_view cannot be reverted.\n";

        return false;
    }
    */
}
