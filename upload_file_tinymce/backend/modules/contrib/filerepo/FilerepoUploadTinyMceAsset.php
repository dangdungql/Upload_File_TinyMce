<?php
namespace app\modules\contrib\filerepo;

class FilerepoUploadTinyMceAsset extends \yii\web\AssetBundle {
    public $sourcePath = '@app/modules/contrib/filerepo/assets/tinymce';

    public $css = [
        //'tiny.css'
    ];

    public $js = [
        'tinymce/tinymce.min.js',
        'tiny.js'
        
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}