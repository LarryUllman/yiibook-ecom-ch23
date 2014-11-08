<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Thank you for your order!</h1>

<p>You have been charged $<?php echo number_format($amount/100, 2); ?>.</p>
