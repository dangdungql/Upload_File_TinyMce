<?php

namespace app\modules\contrib\filerepo;

class FilerepoConfig {
    public static $STORAGE_PATH = 'uploads/filerepo/';
    public static $FILE_EXTENDSIONS_CONVERT_DEFAULT = 'file';
    public static $FILE_EXTENDSIONS_CONVERT = [
        'png' => 'image',
        'jpg' => 'image',
        'doc' => 'word',
        'docx' => 'word',
        'pdf' => 'pdf'
    ];

    public static function GetUploadEndpoint() {
        return \Yii::$app->homeUrl . 'contrib/filerepo/upload/endpoint';  
    }

    public static function GetSelectSearchApi() {
        return \Yii::$app->homeUrl . 'contrib/filerepo/select/search';  
    }
}