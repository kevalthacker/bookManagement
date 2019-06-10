<?php
namespace app\controllers;
use Yii;
use app\models\Users;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Book;
class UserController extends Controller {
    public function beforeSave() {
        if ($this->isNewRecord) $this->added_date = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
    public function actionIndex() {
        $users = Users::find()->orderBy(['user_id' => SORT_DESC])->all();
        $users = Users::find()->joinWith('booklend') // will eagerly load the related models
        ->all();
        //print_r($users);exit;
        return $this->render('//user/index', array('users' => $users));
    }
    public function actionAdduser() {
        $model = new Users;
        // new record
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'photo');
            if (!is_null($image)) {
                $ext = end((explode(".", $image->name)));
                // generate a unique file name to prevent duplicate filenames
                $model->photo = Yii::$app->security->generateRandomString() . ".{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
                $path = Yii::$app->params['uploadPath'] . $model->photo;
                $image->saveAs($path);
            }
            $model->created_by = Yii::$app->admin->id;
            if ($model->save(false)) {
                return $this->redirect(['//user/index']);
            } else {
                var_dump($model->getErrors());
                die();
            }
        }
        return $this->renderAjax('add-user', array('model' => $model));
    }
    public function actionEdituser($id) {
        $model = Users::find()->where(['user_id' => $id])->one();
        // $id not found in database
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        $oldimg = $model->photo;
        // update record
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'photo');
            if (!is_null($image)) {
                unlink(Yii::$app->basePath . '/web/uploads/' . $oldimg);
                $ext = end((explode(".", $image->name)));
                // generate a unique file name to prevent duplicate filenames
                $model->photo = Yii::$app->security->generateRandomString() . ".{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
                $path = Yii::$app->params['uploadPath'] . $model->photo;
                $image->saveAs($path);
            } else {
                $model->photo = $oldimg;
            }
            $model->created_by = Yii::$app->admin->id;
            if ($model->save(false)) {
                return $this->redirect(['//user/index']);
            } else {
                var_dump($model->getErrors());
                die();
            }
        }
        return $this->renderAjax('edit-user', ['model' => $model]);
    }
    public function actionDelete($id) {
        $model = Users::findOne($id);
        // $id not found in database
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        // delete record
        $model->delete();
        return $this->redirect(['//user/index']);
    }
}
