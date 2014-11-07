<?php
/* @var $this CartContentController */
/* @var $model CartContent */

$this->breadcrumbs=array(
	'Cart Contents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CartContent', 'url'=>array('index')),
	array('label'=>'Create CartContent', 'url'=>array('create')),
	array('label'=>'Update CartContent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CartContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CartContent', 'url'=>array('admin')),
);
?>

<h1>View CartContent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cart_id',
		'book_id',
		'quantity',
	),
)); ?>
