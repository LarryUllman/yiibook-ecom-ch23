<?php

class OrderController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'create' and 'view' actions
				'actions'=>array('create','view'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		// Must have processed a charge before coming here:
		if (!isset(Yii::app()->session['payment_id'])) {
			throw new CHttpException(400, 'You have not made a purchase.');
		}

		// Get the payment info:
		$cmd = Yii::app()->db->createCommand('SELECT * FROM payment WHERE id=:id');
		$payment_id = Yii::app()->session['payment_id'];
		$cmd->bindParam(':id', $payment_id, PDO::PARAM_INT);
		$payment = $cmd->queryRow();

		if ($payment === null) {
			throw new CHttpException(404,'You have not made a purchase.');
		}

		// Fetch the customer, if existing:
		$customer=Customer::model()->find('email=:email', array(':email' => $payment['email']));

		// If no customer, create a new one:
		if($customer===null) {
			$customer = new Customer;
			$customer->email = $payment['email'];
			$customer->save();
		}

		// Store the email address in the session, if desired.

		// Get the cart:
		$cart = Utilities::getCart();

		// Create the order:
		$order=new Order;
		$order->customer_id = $customer->id;
		$order->payment_id = $payment['id'];
		$order->total = $payment['amount'];
		$order->date_entered = $payment['date_added'];
		$order->save();

		// Clear the cart:
		$cart->clear();

		$this->render('view',array(
			'model'=>$order
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
