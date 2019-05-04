<?php
use app\modules\contrib\filerepo\FilerepoUploadTinyMceAsset;
//use app\common\components\Tinymce\TinyMce;
//use app\common\components\Tinymce\TinyMceAsset;
use app\modules\contrib\filerepo\FilerepoUploadTinyMceWidget;
//use app\modules\contrib\filerepo\FilerepoUploadWidget;
//use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\grid\GridView;

$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_HEAD);
$asset = FilerepoUploadTinyMceAsset::register($this) 

?>

<div class="files-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    
    <?= FilerepoUploadTinyMceWidget::widget(['id'=>'path', 'form' => $form, 'model' => $model]); ?>  <!--id/name/$mode/multi-one/required -->
    

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>
    
    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
