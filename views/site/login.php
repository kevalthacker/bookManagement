<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="form-signin">
        <h1 class="form-signin-heading"><?= Html::encode($this->title) ?></h1>
        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}{input}<div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'sr-only'],
            'inputOptions' => ['class' => 'form-control'],
        ],
    ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"checkbox\"><label>{input} {label}</label><div class=\"col-lg-12\">{error}</div></div>",
        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

    </div>