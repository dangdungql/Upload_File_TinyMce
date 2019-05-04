<?php
namespace app\modules\contrib\filerepo;

use yii\base\Widget;


class FilerepoUploadWidget extends Widget {
    public $folder = '';
    public $kcfOptions = [];
    public function init() {
        parent::init();
    }

    public function run() {
        return $this->render('filerepo_uploadwidget', ['folder' => $this->folder]);
    }
}