<?php
namespace app\modules\contrib\filerepo;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use app\modules\contrib\DebugUtil;


class FilerepoUploadTinyMceWidget extends Widget {
    public $folder = '';
    public $form;
    public $model;

      
    public function init() {
        parent::init();
    }

    public function run() {
    	$data = ['folder' => $this->folder, 'form' => $this->form, 'model' => $this->model];
        return $this->render('filerepo_uploadtinymcewidget', $data);
        
    }
}