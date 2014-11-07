<?php
/* @var $this OrderContentController */
/* @var $model OrderContent */

$this->breadcrumbs=array(
	'Order Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderContent', 'url'=>array('index')),
	array('label'=>'Create OrderContent', 'url'=>array('create')),
	array('label'=>'View OrderContent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrderContent', 'url'=>array('admin')),
);
?>

<h1>Update OrderContent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>