    <?php 
use app\modules\contrib\filerepo\FilerepoConfig;
foreach ($refs as $ref): ?>
        <br/><a href='<?= Yii::$app->homeUrl . FilerepoConfig::$STORAGE_PATH . $ref->file_path ?>'><?= $ref->file_name ?></a>
    <?php endforeach; ?>
