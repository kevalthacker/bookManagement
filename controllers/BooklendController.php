<?php
namespace app\controllers;
use Yii;
use app\models\BookLend;
use yii\web\Controller;
use app\models\Book;
class BooklendController extends Controller {
    public function beforeSave() {
        if ($this->isNewRecord) $this->date_added = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
    public function actionAssignbook($id) {
        $book = Book::find()->where(['>', 'book_inventory', '0'])->all();
        $model = new BookLend;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->user_id = $id;
                $model->created_by = Yii::$app->admin->id;
                $model->date_added = date('Y-m-d h:i:s');
                $model->save();
                $id = $model->book_id;
                $fbook = Book::find()->where(['book_id' => $id])->all();
                foreach ($fbook as $b) {
                    $new_book_inventory = $b->book_inventory - 1;
                }
                Book::updateAll(['book_inventory' => $new_book_inventory], ['book_id' => $id]);
                return $this->redirect(['//user/index']);
            }
        }
        return $this->renderAjax('//booklend/lend-book', ['book' => $book, 'model' => $model]);
    }
}