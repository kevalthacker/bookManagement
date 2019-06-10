<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $model->isNewRecord ? 'Add Book' : 'Update Book';
?>
<div class="row page-header">
  <div class="col-md-8"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-4"></div>
</div>

<div class="clearfix"></div>
<?php $form = ActiveForm::begin([
        'id' => 'book-form',
        'options' => ['enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}{input}<div class=\"col-lg-12\">{error}</div>",
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]); ?>

        <?= $form->field($model, 'book_title')->textInput(['autofocus' => true])->label('Book Title') ?>

        <?= $form->field($model, 'book_author')->textInput(['autofocus' => true])->label('Book Author') ?>

        <?= $form->field($model, 'book_published_year')->textInput(['autofocus' => true])->label('Book published Year') ?>

        <?= $form->field($model, 'book_img')->fileInput()->label('Book Image') ?>
        <?php if($model->book_img!='') { ?>
             <img src="<?php echo Yii::$app->request->BaseUrl . '/uploads/'.$model->book_img; ?>" width="50"/>
        <?php } ?>
        
        <?= $form->field($model, 'book_inventory')->textInput(['autofocus' => true])->label('Book Inventory') ?>

        
        <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Add Book' : 'Update Book', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'book-button']); ?>
        </div>

    <?php ActiveForm::end(); ?>