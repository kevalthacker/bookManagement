<?php
namespace app\controllers;
use Yii;
use app\models\Book;
use yii\web\Controller;
use yii\web\UploadedFile;
class BookController extends Controller {
    public function beforeSave() {
        if ($this->isNewRecord) $this->date_added = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
    public function actionIndex() {
        $books = Book::find()->all();
        return $this->render('//book/index', array('books' => $books));
    }
    public function actionAddbook() {
        $model = new Book;
        // new record
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'book_img');
            if (!is_null($image)) {
                $ext = end((explode(".", $image->name)));
                // generate a unique file name to prevent duplicate filenames
                $model->book_img = Yii::$app->security->generateRandomString() . ".{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
                $path = Yii::$app->params['uploadPath'] . $model->book_img;
                $image->saveAs($path);
            }
            $model->created_by = Yii::$app->admin->id;
            if ($model->save(false)) {
                return $this->redirect(['//book/index']);
            } else {
                var_dump($model->getErrors());
                die();
            }
        }
        return $this->render('add-book', array('model' => $model));
    }
    public function actionEditbook($id) {
        $model = Book::find()->where(['book_id' => $id])->one();
        // $id not found in database
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        $oldimg = $model->book_img;
        // update record
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'book_img');
            if (!is_null($image)) {
                unlink(Yii::$app->basePath . '/web/uploads/' . $oldimg);
                $ext = end((explode(".", $image->name)));
                // generate a unique file name to prevent duplicate filenames
                $model->book_img = Yii::$app->security->generateRandomString() . ".{$ext}";
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
                $path = Yii::$app->params['uploadPath'] . $model->book_img;
                $image->saveAs($path);
            } else {
                $model->book_img = $oldimg;
            }
            $model->created_by = Yii::$app->admin->id;
            if ($model->save(false)) {
                return $this->redirect(['//book/index']);
            } else {
                var_dump($model->getErrors());
                die();
            }
        }
        return $this->render('edit-book', ['model' => $model]);
    }
    public function actionDelete($id) {
        $model = Book::findOne($id);
        // $id not found in database
        if ($model === null) throw new NotFoundHttpException('The requested page does not exist.');
        // delete record
        $model->delete();
        return $this->redirect(['//book/index']);
    }
}