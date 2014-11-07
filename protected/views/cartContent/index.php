<?php
/* @var $this CartContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cart Contents',
);

$this->menu=array(
	array('label'=>'Create CartContent', 'url'=>array('create')),
	array('label'=>'Manage CartContent', 'url'=>array('admin')),
);
?>

<h1>Cart Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
