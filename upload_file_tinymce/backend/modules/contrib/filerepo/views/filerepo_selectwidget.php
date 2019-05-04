<?php 
use app\modules\contrib\filerepo\FilerepoAsset;
use yii\web\View;
use app\modules\contrib\filerepo\FilerepoConfig;
use yii\web\JqueryAsset;
use app\modules\contrib\filerepo\FilerepoUploadWidget;
use app\modules\contrib\filerepo\FilerepoSelect2ExtendWidget;

$this->registerAssetBundle(JqueryAsset::className(), View::POS_HEAD);
$asset = FilerepoAsset::register($this);
?>
<?= FilerepoSelect2ExtendWidget::widget([
    'model' => $modelWidget->filerepoRefForm,
    'attribute' => 'filerepo_files'
]); ?>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#filerepo_upload_modal">Thêm mới tập tin</button>
<div id="filerepo_upload_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm mới tập tin</h4>
      </div>
      <div class="modal-body">
        <?= FilerepoUploadWidget::widget() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
