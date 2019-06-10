<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Database Design';
?>
    <div class="site-about">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-md-6">
                <h3>Table structure for table `admin`</h3>
                <p>

                    CREATE TABLE `admin` (
                    <br/> `admin_id` int(11) NOT NULL,
                    <br/> `name` varchar(128) NOT NULL,
                    <br/> `username` varchar(128) NOT NULL,
                    <br/> `password` varchar(255) NOT NULL,
                    <br/> `password_reset_token` varchar(128) NOT NULL,
                    <br/> `auth_key` varchar(128) NOT NULL,
                    <br/> `email` varchar(64) NOT NULL,
                    <br/> `status` int(1) NOT NULL DEFAULT '1',
                    <br/> `date_added` datetime NOT NULL
                    <br/> ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                    <br/>

                </p>
            </div>
            <div class="col-md-6">
                <h3>Table structure for table `book`</h3>
                <p>

                    CREATE TABLE `book` (
                    <br/> `book_id` int(11) NOT NULL,
                    <br/> `book_title` varchar(128) DEFAULT NULL,
                    <br/> `book_author` varchar(128) DEFAULT NULL,
                    <br/> `book_published_year` int(4) NOT NULL,
                    <br/> `book_img` varchar(255) NOT NULL,
                    <br/> `book_inventory` int(1) NOT NULL DEFAULT '1',
                    <br/> `created_by` int(11) NOT NULL,
                    <br/> `date_added` datetime NOT NULL
                    <br/> ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Table structure for table `book_lend_track`</h3>
                <p>

                    CREATE TABLE `book_lend_track` (
                    <br/> `lend_id` int(11) NOT NULL,
                    <br/> `user_id` int(11) NOT NULL,
                    <br/> `book_id` int(11) NOT NULL,
                    <br/> `start_date` date NOT NULL,
                    <br/> `end_date` date NOT NULL,
                    <br/> `special_notes` varchar(255) NOT NULL,
                    <br/> `created_by` int(11) NOT NULL,
                    <br/> `date_added` datetime NOT NULL
                    <br/> ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

                </p>
            </div>
            <div class="col-md-6">

                <h3>Table structure for table `users`</h3>
                <p>

                    CREATE TABLE `users` ( `user_id` int(11) NOT NULL,
                    <br/> `salutation` varchar(255) DEFAULT NULL,
                    <br/> `title` varchar(255) DEFAULT NULL,
                    <br/> `firstname` varchar(255) DEFAULT NULL,
                    <br/> `lastname` varchar(255) DEFAULT NULL,
                    <br/> `street` varchar(255) DEFAULT NULL,
                    <br/> `streetnumber` varchar(45) DEFAULT NULL,
                    <br/> `zip` varchar(45) DEFAULT NULL,
                    <br/> `city` varchar(255) DEFAULT NULL,
                    <br/> `description` text,
                    <br/> `photo` varchar(255) NOT NULL,
                    <br/> `register_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                    <br/> `created_by` int(11) NOT NULL,
                    <br/> `date_added` datetime NOT NULL
                    <br/> ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                </p>

            </div>

        </div>
    </div>