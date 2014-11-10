<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'Carts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cart', 'url'=>array('index')),
	array('label'=>'Create Cart', 'url'=>array('create')),
	array('label'=>'Update Cart', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>

<h1>Cart Contents</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cart-grid',
	'dataProvider'=>$model->getContents(),
	'columns'=>array(
		'book.title',
		'book.price',
		'quantity',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}'
		),
	),
)); ?>

<h3>Total: <?php echo Utilities::formatAmount($model->getTotal()); ?></h3>

<?php echo CHtml::link('Checkout', array ('/pay')); ?>