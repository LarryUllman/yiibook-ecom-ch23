<?php
/* @var $this OrderContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Contents',
);

$this->menu=array(
	array('label'=>'Create OrderContent', 'url'=>array('create')),
	array('label'=>'Manage OrderContent', 'url'=>array('admin')),
);
?>

<h1>Order Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
