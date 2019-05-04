<?php

namespace app\modules\contrib\filerepo\models;

use yii\base\Model;
use app\modules\contrib\filerepo\FilerepoService;


class FilerepoRefForm extends Model {
    public $filerepo_files;
    public $object_type;
    public $object_id;

    public function init() {
        parent::init();
        $this->filerepo_files = FilerepoService::getFilerepoRefIds($this->object_type, $this->object_id);
    }

    public function rules() {
        return [
            ['filerepo_files', 'safe'],
            [['filerepo_files'], 'each', 'rule' => ['integer']],
            ['object_id', 'integer'],
            ['object_type', 'string']
        ];
    }
}