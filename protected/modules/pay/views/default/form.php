<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h1>Pay</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pay-form',
	'enableAjaxValidation'=>false,
)); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<div class="row">
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
	<?php echo $form->error($model,'email'); ?>
</div>
<div class="row">
	<label for="cc-num" class="required">Credit Card Number <span class="required">*</span></label>
	<input size="20" maxlength="20" id="cc-num" type="text" autocomplete="off">
</div>
<div class="row">
	<label class="required">Credit Card Expiration (MM/YYYY) <span class="required">*</span></label>
	<input size="2" maxlength="2" id="cc-exp-month" type="text" autocomplete="off"> / <input size="4" maxlength="4" id="cc-exp-year" type="text" autocomplete="off">
</div>
<div class="row">
	<label class="required">Credit Card CVC <span class="required">*</span></label>
	<input size="4" maxlength="4" id="cc-cvc" type="text" autocomplete="off">
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Pay $' . number_format($model->amount/100, 2), array('id'=>'submit-btn')); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<?php echo CHtml::scriptFile('https://js.stripe.com/v2/'); ?>

<?php 
Yii::app()->clientScript->registerScript('stripe', "
	Stripe.setPublishableKey('$key');
	$('#pay-form').submit(function(){
		// Flag variable:
		var error = false;

		// disable the submit button to prevent repeated clicks:
		$('#submit-btn').attr('disabled', 'disabled');

		// Get the values:
		var ccNum = $('#cc-num').val(), cvcNum = $('#cc-cvc').val(), expMonth = $('#cc-exp-month').val(), expYear = $('#cc-exp-year').val();

		// Validate the number:
		if (!Stripe.card.validateCardNumber(ccNum)) {
			error = true;
			reportError('The credit card number appears to be invalid.');
		}

		// Validate the CVC:
		if (!Stripe.card.validateCVC(cvcNum)) {
			error = true;
			reportError('The CVC number appears to be invalid.');
		}

		// Validate the expiration:
		if (!Stripe.card.validateExpiry(expMonth, expYear)) {
			error = true;
			reportError('The expiration date appears to be invalid.');
		}

		// Validate other form elements, if needed!

		// Check for errors:
		if (!error) {
			
			// Get the Stripe token:
			Stripe.card.createToken({
				number: ccNum,
				cvc: cvcNum,
				exp_month: expMonth,
				exp_year: expYear
			}, stripeResponseHandler);

		}
		return false;
	}); // Submit function.
	function reportError(msg) {

		// Show the error in the form:
		alert(msg);

		// re-enable the submit button:
		$('#submit-btn').prop('disabled', false);
		return false;
	}
	function stripeResponseHandler(status, response) {
		
		// Check for an error:
		if (response.error) {

			reportError(response.error.message);
			
		} else { // No errors, submit the form:

		  var f = $('#pay-form');

		  // Token contains id, last4, and card type:
		  var token = response['id'];
		  
		  // Insert the token into the form so it gets submitted to the server
		  f.append('<input type=\"hidden\" name=\"Payment[token]\" value=\"' + token + '\">');
		
		  // Submit the form:
		  f.get(0).submit();

		}
		
	} // End of stripeResponseHandler() function.
");
?>
