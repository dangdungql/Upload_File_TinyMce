<?php
namespace app\modules\contrib\filerepo;

use yii\base\Widget;


class FilerepoShowfilesWidget extends Widget {
    public $objectId = '';
    public $objectType = '';

    public function init() {
        parent::init();
    }

    public function run() {
        $refs = FilerepoService::getFilerepoRefs($this->objectType, $this->objectId);
        return $this->render('filerepo_showfileswidget', ['objectId' => $this->objectId, 'objectType' => $this->objectType, 'refs' => $refs]);
    }
}