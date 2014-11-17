<?php
class Utilities {
	public static function getCart() {

		// Get or create the cart session ID:
		if (isset(Yii::app()->request->cookies['SESSION'])) {
			$sess = Yii::app()->request->cookies['SESSION'];
		} else {
			$sess = bin2hex(openssl_random_pseudo_bytes(16));
		}

		// Send the cookie:
		Yii::app()->request->cookies['SESSION'] = new CHttpCookie('SESSION', $sess, array('expire' => time()+(60*60*24*30)));

		$cart=Cart::model()->find('customer_session_id=:sess', array(':sess' => $sess));
		if($cart===null) {
			$cart = new Cart();
			$cart->customer_session_id = $sess;
			$cart->save();
		}
		return $cart;

	}

	public static function formatAmount($amount) {
		return '$' . number_format($amount/100, 2);
	}

	public static function formatDate($date)
	{
		return DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('M j, Y');

	}


}