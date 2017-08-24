<?php

namespace app\controllers;

class SayController extends \yii\web\Controller
{
    public function actionSay()
    {
        return $this->render('say');
    }

}
