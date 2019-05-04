<?php
namespace app\modules\contrib\filerepo;

class FilerepoAsset extends \yii\web\AssetBundle {
    public $sourcePath = '@app/modules/contrib/filerepo/assets';

    public $css = [
        'fine-uploader/fine-uploader-new.css',
        'select2.min.css',
        'select2-bootstrap.min.css'
    ];

    public $js = [
        'fine-uploader/fine-uploader.min.js',
        'select2.full.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}