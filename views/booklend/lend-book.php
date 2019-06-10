<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$books = array();
foreach($book as $b){
    $books[$b->book_id] = $b->book_title;
}

?>

<?php $form = ActiveForm::begin([
        'id' => 'book-lend-form',
        'options' => ['enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}{input}<div class=\"col-lg-12\">{error}</div>",
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]); ?>

        <div class="row">
        <div class="col-md-12">    
        <?= $form->field($model, 'book_id')->dropDownList($books)->label('Select Book') ?>
        </div>
                
        </div>
      
        <div class="row">
        <div class="col-md-6">    
        <?= $form->field($model, 'start_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999-99-99',])->label('State Date') ?>
        </div>
        <div class="col-md-6">         
        <?= $form->field($model, 'end_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999-99-99',])->label('End Date') ?>        
        </div>        
        </div>   


       <?= $form->field($model, 'special_notes')->textarea(['rows' => '4'])->label('Special Notes') ?> 

        <div class="form-group">
                <?= Html::submitButton('Submit', ['class' =>  'btn btn-primary', 'name' => 'lend-book-button']); ?>
        </div>

    <?php ActiveForm::end(); ?>