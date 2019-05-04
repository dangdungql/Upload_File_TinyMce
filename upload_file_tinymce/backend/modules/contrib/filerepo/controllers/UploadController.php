<?php

namespace app\modules\contrib\filerepo\controllers;

use Yii;
use yii\web\Controller;
use app\modules\contrib\filerepo\FilerepoUploadHandler;
use app\modules\contrib\filerepo\FilerepoConfig;
use app\modules\contrib\filerepo\models\FilerepoFile;
use app\modules\contrib\DebugUtil;


class UploadController extends Controller {
    public function beforeAction($action) {            
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionWidget() {
        return $this->renderAjax('widget');
    }
    
    public function actionEndpoint() {
        $this->enableCsrfValidation = false;

        $request = Yii::$app->request;
        $uploader = $this->_getUploader();

        if ($request->isPost) {
            header("Content-Type: text/plain");
            if (isset($_GET["done"])) {
                $result = $uploader->combineChunks(FilerepoConfig::$STORAGE_PATH);
            }
            // Handles upload requests
            else {
                // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
                $result = $uploader->handleUpload(FilerepoConfig::$STORAGE_PATH);
                // To return a name used for uploaded file you can use the following line.
                $result["uploadName"] = $uploader->getUploadName();
                
                $filerepo = new FilerepoFile([
                    'name' => $result['name'],
                    'type' => $result['ext'],
                    'path' => $result['uploadName'],
                    'slug' => $result['uuid'],
                    'role' => 'protected',
                    'folder' => $request->post('folder', ''),
                    'owner_id' => Yii::$app->user->isGuest ? null : Yii::$app->user->id
                ]);
                $filerepo->save();
            }
            return json_encode($result);
        } else if ($request->isDelete) {
            $result = $uploader->handleDelete(FilerepoConfig::$STORAGE_PATH);
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
        }
    }

    private function _getUploader() {
        $uploader = new FilerepoUploadHandler();
        $uploader->allowedExtensions = array();
        $uploader->sizeLimit = null;
        $uploader->inputName = "qqfile";
        $uploader->chunksFolder = "chunks";

        return $uploader;
    }
}