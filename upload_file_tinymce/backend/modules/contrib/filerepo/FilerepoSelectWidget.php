<?php
namespace app\modules\contrib\filerepo;

use yii\base\Widget;
use app\modules\contrib\filerepo\models\FilerepoRef;
use yii\helpers\ArrayHelper;
use app\modules\contrib\filerepo\models\VFilerepoRef;
use app\modules\contrib\filerepo\models\FilerepoRefForm;
use app\modules\contrib\DebugUtil;


class FilerepoSelectWidget extends Widget {
    public $objectType;
    public $objectId;
    public $filerepoRefForm;
    
    public function init() {
        parent::init();
    }

    public function run() {
        $this->filerepoRefForm = new FilerepoRefForm(['object_id' => $this->objectId, 'object_type' => $this->objectType]);
        return $this->render('filerepo_selectwidget', ['modelWidget' => $this]);
    }

    public static function loadAndSaveImageRefsFromPost($objectType, $objectId) {
        return FilerepoService::loadAndSaveImageRefsFromPost($objectType, $objectId);
    }

    public static function saveImageRefs($objectType, $objectId, $fileRefIds) {
        FilerepoService::saveImageRefs($objectType, $objectId, $fileRefIds);
    }

    public static function updateImageRefs($objectType, $objectId, $imageRefIds) {
        self::deleteImageRefs($objectType, $objectId);
        self::saveImageRefs($objectType, $objectId);
    }

    public static function deleteImageRefs($objectType, $objectId) {
        FilerepoService::deleteImageRefs($objectType, $objectId);
    }   
}