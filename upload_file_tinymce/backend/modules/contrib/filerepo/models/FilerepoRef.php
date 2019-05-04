<?php

namespace app\modules\contrib\filerepo\models;

use Yii;

/**
 * This is the model class for table "filerepo_ref".
 *
 * @property int $id
 * @property int $file_id
 * @property int $object_id
 * @property string $object_type
 * @property int $status
 * @property string $created_at
 */
class FilerepoRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filerepo_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'object_id', 'status'], 'default', 'value' => null],
            [['file_id', 'object_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['object_type'], 'string', 'max' => 255],
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
            'object_id' => 'Object ID',
            'object_type' => 'Object Type',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
