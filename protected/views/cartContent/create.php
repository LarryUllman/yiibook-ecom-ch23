<?php
/* @var $this CartContentController */
/* @var $model CartContent */

$this->breadcrumbs=array(
	'Cart Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CartContent', 'url'=>array('index')),
	array('label'=>'Manage CartContent', 'url'=>array('admin')),
);
?>

<h1>Create CartContent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>