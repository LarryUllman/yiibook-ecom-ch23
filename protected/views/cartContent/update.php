<?php
/* @var $this CartContentController */
/* @var $model CartContent */

$this->breadcrumbs=array(
	'Cart Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CartContent', 'url'=>array('index')),
	array('label'=>'Create CartContent', 'url'=>array('create')),
	array('label'=>'View CartContent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CartContent', 'url'=>array('admin')),
);
?>

<h1>Update CartContent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>