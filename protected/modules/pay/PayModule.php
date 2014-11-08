<?php

class PayModule extends CWebModule
{
	public $public_key;
	public $private_key;
	public $redirectOnSuccess;
	public $amount;

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		if ($this->public_key == null) {
			throw new CException('Your public Stripe key is required.');
		}
		if ($this->private_key == null) {
			throw new CException('Your private Stripe key is required.');
		}

		// import the module-level models and components
		$this->setImport(array(
			'pay.models.*',
			'pay.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{

			// Get the cart session ID:
			if (isset(Yii::app()->request->cookies['SESSION'])) {
				$sess = Yii::app()->request->cookies['SESSION'];
			}
			$cart=Cart::model()->find('customer_session_id=:sess', array(':sess' => $sess));
			if($cart===null) {
				throw new CException('You have nothing to purchase.');
			} else {
				$this->amount = $cart->getTotal();
			}

			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
