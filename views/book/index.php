<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Book';
?>
<div class="row page-header">
  <div class="col-md-8"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-4"><?php echo Html::a('Add New Book', array('book/addbook'), array('class' => 'btn btn-primary pull-right')); ?></div>
</div>

<div class="clearfix"></div>
<table class="table table-bordered table-hover">
	<tr>
		<td>#</td>
		<td>Book Title</td>
		<td>Book Author</td>
		<td>Book Published Year</td>
		<td>Book Image</td>
		<td>Actions</td>
	</tr>
	<?php foreach ($books as $book): ?>
		<tr>
			<td><?php echo $book->book_id; ?></td>
			<td><?php echo $book->book_title; ?></td>
			<td><?php echo $book->book_author; ?></td>
			<td><?php echo $book->book_published_year; ?></td>
			<td><img src="<?php echo Yii::$app->request->BaseUrl . '/uploads/'.$book->book_img; ?>" width="50"/></td>
	        <td><?= Html::a("Edit", ['book/editbook', 'id' => $book->book_id] , ['class' => 'btn btn-success']); ?>   <?= Html::a("Delete", ['book/delete', 'id' => $book->book_id], ['class' => 'btn btn-danger']); ?></td>
		</tr>
	<?php endforeach; ?>
</table>