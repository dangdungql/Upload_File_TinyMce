<?php

namespace app\modules\contrib\filerepo;

use yii\helpers\ArrayHelper;
use app\modules\contrib\helper\ConvertHelper;
use app\modules\contrib\filerepo\models\FilerepoRef;
use app\modules\contrib\filerepo\models\VFilerepoRef;
use app\modules\contrib\filerepo\models\FilerepoRefForm;


class FilerepoService {
    public static $ROLE_PUBLIC = 'public';
    public static $ROLE_PROTECTED = 'protected';
    public static $ROLE_PRIVATE = 'private';

    public static function getFileStoragePath($fileUniqueBaseName, $fileExtension) {
        return FilerepoConfig::$STORAGE_PATH . $fileUniqueBaseName . '.' . $fileExtension;
    }

    public static function getFileUniqeBaseName($file) {
        $baseNameConverted = ConvertHelper::convertVNToNonVN($file->baseName);
        $baseNameUnique = uniqid('filerepo_') . '-' . $baseNameConverted;
        return $baseNameUnique;
    }

    public static function getTypeFromExtension($extension) {
        if (isset(FilerepoConfig::$FILE_EXTENDSIONS_CONVERT[$extension])) {
            return FilerepoConfig::$FILE_EXTENDSIONS_CONVERT[$extension];
        }
        return FilerepoConfig::$FILE_EXTENDSIONS_CONVERT_DEFAULT;
    }

    public static function getFilerepoRefsSelect2Data($objectType, $objectId) {
        return VFilerepoRef::find()->select('file_id as id, file_text as text')->where([
            'ref_object_type' => $objectType,
            'ref_object_id' => $objectId
        ])->asArray()->all();
    }

    public static function getFilerepoRefs($objectType, $objectId) {
        return VFilerepoRef::find()->where([
            'ref_object_type' => $objectType,
            'ref_object_id' => $objectId
        ])->all();
    }

    public static function getFilerepoRefIds($objectType, $objectId) {
        $refs = self::getFilerepoRefs($objectType, $objectId);
        $ids = [];
        if (is_array($refs))
        foreach ($refs as $ref) {
            array_push($ids, $ref->file_id);
        }
        return $ids;
    }

    public static function saveImageRefs($objectType, $objectId, $fileRefIds) {
        if (is_array($fileRefIds))
        foreach ($fileRefIds as $fileRefId) {
            $fileref = new FilerepoRef([
                'object_type' => $objectType,
                'object_id' => $objectId,
                'file_id' => $fileRefId
            ]);
            $fileref->save();
        }
        
    }

    public static function deleteImageRefs($objectType, $objectId) {
        FilerepoRef::deleteAll([
            'object_type' => $objectType,
            'object_id' => $objectId
        ]);
    }   

    public static function loadAndSaveImageRefsFromPost($objectType, $objectId) {
        $filerepoRefForm = new FilerepoRefForm();
        $filerepoRefForm->load(\Yii::$app->request->post());

        if ($filerepoRefForm->validate()) {
            self::deleteImageRefs($objectType, $objectId);
            self::saveImageRefs($objectType, $objectId, $filerepoRefForm->filerepo_files);
            return true;
        }
        return false;
    }
}