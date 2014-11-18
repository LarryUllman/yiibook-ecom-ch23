<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index')),
	array('label'=>'Create Book', 'url'=>array('create')),
	array('label'=>'Update Book', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Book', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Book', 'url'=>array('admin')),
);
?>

<h1>View Book #<?php echo $model->id; ?></h1>

<div class="view">

	<?php echo '<img src="/images/' . $model->id . '.jpg">'; ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($model->title); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('price')); ?>:</b>
	<?php echo Utilities::formatAmount($model->price); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($model->description); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($model->author); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('date_published')); ?>:</b>
	<?php echo Utilities::formatDate($model->date_published, 'Y-m-d'); ?>
	<br />

</div>

<?php echo CHtml::link('Add to Cart', array ('/cart/add', 'id' => $model->id)); ?>