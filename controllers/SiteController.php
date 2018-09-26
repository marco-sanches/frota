<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;


class SiteController extends Controller
{
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

    public function actionIndex()
	{
		$req=\app\models\Requisicao::findBySql('SELECT * FROM `visao_calendario`')->asArray()->all();
		$events=array();
		foreach($req as $event) {			
			$Event=new \yii2fullcalendar\models\Event();
			if ($event['executada']==1){
				$exec = '**';
			}
			elseif ($event['hora_saida']!=null && $event['executada']!=1){
				$exec = '*';
			}
			else {
				$exec = null;
			}
			$Event->title = "\n\r". $event['id_secao']." - ". $event['placa'].$exec."\n\r".$event['nome_mot'] ;
			$Event->start = $event['data_util']. ' ' . $event['hora_ini'];
			$Event->end = $event['data_util']. ' ' .$event['hora_fim'];	
			$Event->url = Url::to(['requisicao/view', 'id'=>$event['id_req']]);
			if ($event['id_servico']==5 || $event['id_servico']==6 || $event['id_servico']==7){$Event->backgroundColor='red';}
			if ($event['id_servico']==3 || $event['id_servico']==4 ){$Event->backgroundColor='green';}
			if ($event['cancelada']==1){$Event->backgroundColor='grey';}
			$events[]=$Event;
		}
		return $this->render('index', array('events'=>$events));
	}

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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }
}
