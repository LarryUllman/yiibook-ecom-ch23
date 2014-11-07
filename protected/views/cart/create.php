<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'Carts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cart', 'url'=>array('index')),
	array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>

<h1>Create Cart</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>