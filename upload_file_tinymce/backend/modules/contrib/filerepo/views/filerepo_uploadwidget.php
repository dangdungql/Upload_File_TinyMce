<?php 
use app\modules\contrib\filerepo\FilerepoAsset;
use yii\web\View;
$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_HEAD);
$asset = FilerepoAsset::register($this) 

?>
<?php include('_fine_uploader.php') ?>
<script>
    $(document).ready(function() {
        initFineUploader();
    })
</script>