<?php

namespace app\modules\contrib\filerepo\controllers;

use Yii;
use yii\web\Controller;
use app\modules\contrib\filerepo\models\FilerepoFile;
use app\modules\contrib\filerepo\models\VFilerepoRef;
use app\modules\contrib\filerepo\models\FilerepoRef;

class SelectController extends Controller {
    public function actionSearch() {
        $q = Yii::$app->request->get('q', '');
        $files = FilerepoFile::find()->select("id, name, created_at, (name || ' (' || created_at || ')') as text")->where(['like', 'name', $q])->orderBy(['created_at' => SORT_DESC])->asArray()->all();
        return json_encode(['results' => $files]);
    }

    public function actionWidget() {
        return $this->renderAjax('widget');
    }
}