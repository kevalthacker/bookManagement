<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Book;
use app\models\Users;
class SiteController extends Controller {
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return ['access' => ['class' => AccessControl::className(), 'only' => ['logout'], 'rules' => [['actions' => ['logout'], 'allow' => true, 'roles' => ['?'], ], ], ], 'verbs' => ['class' => VerbFilter::className(), 'actions' => ['logout' => ['post'], ], ], ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions() {
        return ['error' => ['class' => 'yii\web\ErrorAction', ], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null, ], ];
    }
    public function beforeAction($action) {
        if (Yii::$app->admin->isGuest && Yii::$app->controller->action->id != "login") {
            Yii::$app->admin->loginRequired();
        }
        //something code right here if user valid
        return true;
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $book = Book::find()->count();
        $user = Users::find()->count();
        return $this->render('index', ['book' => $book, 'user' => $user]);
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->admin->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $model->password = '';
        $this->layout = 'login.php';
        return $this->render('login', ['model' => $model, ]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->admin->logout();
        return $this->redirect(['site/login'])->send();
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionHelp() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('help', ['model' => $model, ]);
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDatabase() {
        return $this->render('database');
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionAddAdmin() {
        //$model = Admin::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $admin = new Admin();
            $admin->username = 'admin';
            $admin->email = 'admin@devreadwrite.com';
            $admin->setPassword('admin');
            $admin->generateAuthKey();
            if ($admin->save()) {
                echo 'good';
            }
        }
    }
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($admin = $model->signup()) {
                /* if (Yii::$app->getAdmin()->login($admin)) {
                    return $this->goHome();
                }*/
            }
        }
        return $this->render('signup', ['model' => $model, ]);
    }
}
