<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
    <?php $this->beginPage() ?>
        <!DOCTYPE html>
        <html lang="<?= Yii::$app->language ?>">

        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?php $this->registerCsrfMetaTags() ?>
                <title>
                    <?= Html::encode($this->title) ?>
                </title>
                <?php $this->head() ?>
                    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&display=swap" rel="stylesheet">
                    <style>
                        body {
                            background: #fff;
                        }
                    </style>
        </head>

        <body>
            <?php $this->beginBody() ?>

                <div class="wrap">
                    <?php
NavBar::begin([
    'brandLabel' => 'Management System',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'Books', 'url' => ['/book/index']],
    ['label' => 'Users', 'url' => ['/user/index']],    
    ['label' => 'Help', 'url' => ['/site/help']],
    ['label' => 'Database Design ', 'url' => ['/site/database']],    
];

if (Yii::$app->admin->isGuest) {
    $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->admin->identity->name . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);

NavBar::end();
    ?>

                        <div class="container">
                            <div class="row">

                                <div class="col-md-12">
                                    <?= Alert::widget() ?>
                                        <?= $content ?>

                                </div>

                            </div>

                        </div>
                </div>

                <footer class="footer">
                    <div class="container">
                        <p class="pull-left">&copy; Book Management System
                            <?= date('Y') ?>
                        </p>

                    </div>
                </footer>

                <?php $this->endBody() ?>
        </body>

        </html>
        <?php $this->endPage() ?>