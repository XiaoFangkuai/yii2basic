<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-8-24
 * Time: 15:28
 */
namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use app\models\Log;

class LogBehavior extends Behavior {
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
        ];
    }

    public function afterInsert()
    {
        $log = new Log();
        $log->content = "我添加了标题为{$this->owner->title}的文章";
        $log->created_at = date('Y-m-d H:i:s');
        $log->save();
    }
}