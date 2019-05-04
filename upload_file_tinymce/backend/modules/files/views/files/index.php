<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
use app\classes\widgets\HelloWidget;
use app\common\components\Tinymce\TinyMce;
use app\common\components\Tinymce\TinyMceAsset;
use app\modules\contrib\filerepo\FilerepoUploadTinyMceWidget;
use app\modules\contrib\filerepo\FilerepoUploadWidget;
//use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\files\models\FilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-index">
    
    <?= FilerepoUploadTinyMceWidget::widget(); ?>
    <!-- <?= FilerepoUploadWidget::widget(); ?> -->
<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
        </div>
    </div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Files', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'path',
            'status',
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
