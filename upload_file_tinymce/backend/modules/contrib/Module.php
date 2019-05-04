<?php
/**
 * Description of Module
 *
 * @author TriLVH
 */
namespace app\modules\contrib;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        $this->modules = [
            'filerepo' => [
                'class' => 'app\modules\contrib\filerepo\Module'
            ]
        ];
    }
}