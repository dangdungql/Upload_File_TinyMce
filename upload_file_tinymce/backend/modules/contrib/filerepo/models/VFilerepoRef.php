<?php

namespace app\modules\contrib\filerepo\models;

use Yii;

/**
 * This is the model class for table "v_filerepo_ref".
 *
 * @property int $id
 * @property int $file_id
 * @property int $ref_object_id
 * @property string $ref_object_type
 * @property int $ref_status
 * @property string $ref_created_at
 * @property string $file_name
 * @property string $file_slug
 * @property string $file_description
 * @property string $file_path
 * @property string $file_role
 * @property int $file_created_by
 * @property string $file_created_at
 * @property string $file_updated_at
 * @property string $file_type
 * @property string $file_data
 * @property int $file_status
 * @property int $file_owner_id
 * @property string $file_folder
 * @property string $file_text
 */
class VFilerepoRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_filerepo_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'file_id', 'ref_object_id', 'ref_status', 'file_created_by', 'file_status', 'file_owner_id'], 'default', 'value' => null],
            [['id', 'file_id', 'ref_object_id', 'ref_status', 'file_created_by', 'file_status', 'file_owner_id'], 'integer'],
            [['ref_created_at', 'file_created_at', 'file_updated_at'], 'safe'],
            [['file_description', 'file_data', 'file_text'], 'string'],
            [['ref_object_type', 'file_name', 'file_slug', 'file_path', 'file_role', 'file_type', 'file_folder'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_id' => 'File ID',
            'ref_object_id' => 'Ref Object ID',
            'ref_object_type' => 'Ref Object Type',
            'ref_status' => 'Ref Status',
            'ref_created_at' => 'Ref Created At',
            'file_name' => 'File Name',
            'file_slug' => 'File Slug',
            'file_description' => 'File Description',
            'file_path' => 'File Path',
            'file_role' => 'File Role',
            'file_created_by' => 'File Created By',
            'file_created_at' => 'File Created At',
            'file_updated_at' => 'File Updated At',
            'file_type' => 'File Type',
            'file_data' => 'File Data',
            'file_status' => 'File Status',
            'file_owner_id' => 'File Owner ID',
            'file_folder' => 'File Folder',
            'file_text' => 'File Text',
        ];
    }
}
