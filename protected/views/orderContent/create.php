<?php
/* @var $this OrderContentController */
/* @var $model OrderContent */

$this->breadcrumbs=array(
	'Order Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderContent', 'url'=>array('index')),
	array('label'=>'Manage OrderContent', 'url'=>array('admin')),
);
?>

<h1>Create OrderContent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>