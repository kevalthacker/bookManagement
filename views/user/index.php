<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Users';
?>
<div class="row page-header">
  <div class="col-md-8"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-4"><?php echo Html::button('Add New User',  array('value' => Url::to('adduser') , 'class' => 'btn btn-primary pull-right', 'id' => 'addUser')); ?></div>
</div>

<div class="clearfix"></div>
<table class="table table-bordered table-hover">
	<tr>
		<td>#</td>
		<td>Name</td>
	
		<td>Books</td>
		<td>Actions</td>
	</tr>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->user_id; ?></td>
			<td><img src="<?php echo Yii::$app->request->BaseUrl . '/uploads/'.$user->photo; ?>" width="50"/>
			    <br/><?php echo $user->title.' '.$user->firstname.' '.$user->firstname; ?>
			    <br/><small><?php echo $user->streetnumber.', '.$user->street.', '.$user->city.', '.$user->zip; ?></small>    
			</td>
			<td>
			    <?php
    foreach($user->booklend as $booklend) {
        echo "{$booklend->book->book_title}<br/>";
    }			     
			    
			    ?> 
			    
			</td>
	        <td>
	        <?= Html::button('+',  array('value' => Url::to('../booklend/assignbook?id='.$user->user_id) , 'class' => 'btn btn-primary assignBook')); ?>	            
	        <?= Html::button('Edit',  array('value' => Url::to('edituser?id='.$user->user_id) , 'class' => 'btn btn-success editUser')); ?>
	        <?= Html::a("Delete", ['user/delete', 'id' => $user->user_id], ['class' => 'btn btn-danger']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>

     <?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'header' => '<h3>-</h3>', 
    'id' => 'modal',
    'size' => 'modal-lg',
    'closeButton' => [
        'id'=>'close-button',
        'class'=>'close',
        'data-dismiss' =>'modal',
        ],
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>