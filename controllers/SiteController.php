<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Bubble;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionShow()
    {
        $message = ["allpe","banana","orange"];
        return $this->render('show',['message'=>$message]);
    }
    public function actionShow1()
    {
        $message=["a",'b','c'];
        return $this->render('show',['message'=>$message]);
    }
    public function actionShow2()
    {
        $message=["1","2","3"];
        return $this->render('show',['message'=>$message]);
    }
    public function actionShow3(){
        $message=["3","5","7"];
        return $this->render('show',['message'=>$message]);
    }
    public function actionShow4(){
        $message=["2","4","6"];
        return $this->render('show',['message'=>$message]);
    }
    public function actionShow5($param){
        $message=["8","6","4"];
        return $this->render('show',['message'=>$message, 'param' => $param]);
    }
    public function actionBubble()
    {
        $model = new Bubble();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->con()) {
                // form inputs are valid, do something here
                return $this->render('bubble', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('bubble', [
            'model' => $model,
        ]);
    }
}