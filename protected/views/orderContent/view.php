<?php
/* @var $this OrderContentController */
/* @var $model OrderContent */

$this->breadcrumbs=array(
	'Order Contents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderContent', 'url'=>array('index')),
	array('label'=>'Create OrderContent', 'url'=>array('create')),
	array('label'=>'Update OrderContent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderContent', 'url'=>array('admin')),
);
?>

<h1>View OrderContent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'book_id',
		'quantity',
		'price_per',
	),
)); ?>
