<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <div class="site-index">
        <h1>Welcome to Book Management System!</h1>
        <hr/>
        <div class="row">

            <div class="col-md-3">
                <div class="left-view-block">
                    <h1><span class="glyphicon glyphicon-book" aria-hidden="true"></span></h1>
                    <p>
                        <?= $book ?>
                    </p>

                </div>
            </div>
            <div class="col-md-3">
                <div class="left-view-block">
                    <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1>
                    <p>
                        <?= $user ?>
                    </p>

                </div>
            </div>

            <div class="col-md-6">

                <h3>Next Modules</h3>
                <ul>
                    <li>Multiple Admins</li>
                    <li>Reporting Module</li>
                    <li>Inventory Management</li>
                    <li>Late Book Return</li>
                    <li>Email Management System</li>
                    <li>Improvised Dashboard</li>
                </ul>

            </div>
        </div>
    </div>