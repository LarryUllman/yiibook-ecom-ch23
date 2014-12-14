<?php

class DefaultController extends Controller
{
	public function filters() {
		return array(
//			'httpsOnly + index',
		);
	}
	public function filterHttpsOnly($fc) {
		if (Yii::app()->getRequest()->getIsSecureConnection()) {
			$fc->run();
		} else {
			throw new CHttpException(400, 'This page needs to be accessed securely.');
		}
	}

	public function actionIndex()
	{
		$model=new Payment;

		$model->amount = Yii::app()->controller->module->amount;

		if(isset($_POST['Payment'])) {
			$model->attributes=$_POST['Payment'];
			// Temporary:
			$model->charge_id = 'temp';
			if($model->validate()) {
				// Charge via Stripe!
				try {
					Yii::import('pay.vendors.stripe.lib.Stripe');
					Stripe::setApiKey(Yii::app()->controller->module->private_key);
					$charge = Stripe_Charge::create(array(
						"amount" => $model->amount,
						"currency" => "usd",
						"card" => $model->token,
						"description" => $model->email
						)
					);
					if ($charge->paid == true) {
						$model->charge_id = $charge->id;
						$model->save();

						// Store values in session:
						Yii::app()->session['payment_id'] = $model->id;

						// Redirect:
						if (!empty(Yii::app()->controller->module->redirectOnSuccess)) {
							$this->redirect(array(Yii::app()->controller->module->redirectOnSuccess));
						} else {
							$this->redirect(array('thanks', 'amount' => $model->amount));
						}
					}
				} catch (Stripe_CardError $e) {
					$e_json = $e->getJsonBody();
					$err = $e_json['error'];
					$model->addError('Credit Card', $err['message']);
				} catch (Stripe_ApiConnectionError $e) {
				    // Network problem, perhaps try again.
				} catch (Stripe_InvalidRequestError $e) {
				    // You screwed up in your programming. Shouldn't happen!
				} catch (Stripe_ApiError $e) {
				    // Stripe's servers are down!
				} catch (Stripe_CardError $e) {
				    // Something else that's not the customer's fault.
				}
			} // Not validated.
		} // Not posted.
		$this->render('form',array(
		'model'=>$model,
		'key' => Yii::app()->controller->module->public_key
		));
	}
	public function actionThanks($amount) {
		$this->render('thanks',array(
			'amount'=>Yii::app()->controller->module->amount,
		));
	}

}
