<?php

namespace app\modules\contrib\filerepo\models;

use app\modules\contrib\filerepo\FilerepoService;


class UploadForm extends \yii\base\Model {
    public $file;

    public function rules() {
        return [
            [['file'], 'file', 'skipOnEmpty' => false]
        ];
    }

    public function upload() {
        if ($this->validate()) {
            $fileUniqueBaseName = FilerepoService::getFileUniqeBaseName($this->file);
            $fileStoragePath = FilerepoService::getFileStoragePath($fileUniqueBaseName, $this->file->extension);
            
            $this->file->saveAs($fileStoragePath);
            
            return new FilerepoFile([
                'name' => $this->file->baseName,
                'slug' => $fileUniqueBaseName,
                'path' => $fileStoragePath,
                'type' => FilerepoService::getTypeFromExtension($this->file->extension),
                'data' => ['file' => json_encode($this->file)]
            ]);
        }
        return null;
    }
}