<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">

	<?php echo CHtml::link('<img src="/images/' . $data->id . '.jpg">', array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo Utilities::formatAmount($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_published')); ?>:</b>
	<?php echo Utilities::formatDate($data->date_published, 'Y-m-d'); ?>
	<br />

</div>