<?php

namespace app\modules\contrib\filerepo\models;

use Yii;

/**
 * This is the model class for table "filerepo_file".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $path
 * @property string $role
 * @property int $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 * @property string $data
 * @property int $status
 * @property int $owner_id
 * @property string $folder
 */
class FilerepoFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filerepo_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'data'], 'string'],
            [['created_by', 'status', 'owner_id'], 'default', 'value' => null],
            [['created_by', 'status', 'owner_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'path', 'role', 'type', 'folder'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'path' => 'Path',
            'role' => 'Role',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => 'Type',
            'data' => 'Data',
            'status' => 'Status',
            'owner_id' => 'Owner ID',
            'folder' => 'Folder',
        ];
    }
}
