<?php

namespace app\modules\contrib\filerepo;

use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use app\modules\contrib\DebugUtil;


class FilerepoSelect2ExtendWidget extends Select2 {
    public function run() {
        $this->pluginOptions = [
            'allowClear' => true,
            'minimumInputLength' => 0,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => FilerepoConfig::GetSelectSearchApi(),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                'cache' => true,
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateSelection' => new JsExpression('function(model) { return model.text; }'),
            'templateResult' => new JsExpression('function(model) { console.log(model); return  model.text; }')
        ];

        $selectedRefData = FilerepoService::getFilerepoRefsSelect2Data($this->model->object_type, $this->model->object_id);
        $this->data = ArrayHelper::map($selectedRefData, 'id', 'text');
        $this->showToggleAll = false;

        $this->options['placeholder'] = 'Chọn tập tin ...';
        $this->options['multiple'] = true;

        parent::run();
    }
}