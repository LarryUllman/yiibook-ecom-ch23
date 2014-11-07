<?php
/* @var $this CartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carts',
);

$this->menu=array(
	array('label'=>'Create Cart', 'url'=>array('create')),
	array('label'=>'Manage Cart', 'url'=>array('admin')),
);
?>

<h1>Carts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
