<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $model->isNewRecord ? 'Add User' : 'Update User';
?>

<?php $form = ActiveForm::begin([
        'id' => 'user-form',
        'options' => ['enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}{input}<div class=\"col-lg-12\">{error}</div>",
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]); ?>

        <div class="row">
        <div class="col-md-6">    
        <?= $form->field($model, 'salutation')->dropDownList(['Mr' => 'Mr.', 'Mrs' => 'Mrs.'])->label('Salutation') ?>
        </div>
        <div class="col-md-6">         
        <?= $form->field($model, 'title')->textInput()->label('Title') ?>
        </div>        
        </div>
        
        <div class="row">
        <div class="col-md-6">    
        <?= $form->field($model, 'firstname')->textInput()->label('First Name') ?>
        </div>
        <div class="col-md-6">         
        <?= $form->field($model, 'lastname')->textInput()->label('Last Name') ?>  
        </div>        
        </div>        
        
  
        <div class="row">
        <div class="col-md-3">    
        <?= $form->field($model, 'street')->textInput()->label('Street') ?>
        </div>
        <div class="col-md-3">    
        <?= $form->field($model, 'streetnumber')->textInput()->label('Street Number') ?>
        </div>        
        <div class="col-md-3">         
        <?= $form->field($model, 'zip')->textInput()->label('Zip') ?>
        </div>        
        <div class="col-md-3">         
        <?= $form->field($model, 'city')->textInput()->label('City') ?>
        </div>                
        </div>             
        

        
        <?= $form->field($model, 'description')->textarea(['rows' => '4'])->label('Description') ?>
        
        <?= $form->field($model, 'photo')->fileInput()->label('Photo') ?>
        <?php if($model->photo!='') { ?>
             <img src="<?php echo Yii::$app->request->BaseUrl . '/uploads/'.$model->photo; ?>" width="50"/><br/><br/>
        <?php } ?>
        

        <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Add User' : 'Update User', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'book-button']); ?>
        </div>

    <?php ActiveForm::end(); ?>