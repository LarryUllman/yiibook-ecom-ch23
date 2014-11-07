<?php

class CartController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public $defaultAction = 'view';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','update','delete','add'),
				'users'=>array('*'),
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
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new CartContent model.
	 */
	public function actionAdd($id)
	{

		// Need the cart:
		$cart = $this->loadModel();

		// Check for the item already being in the cart:
		$item=CartContent::model()->find('cart_id=:cart AND book_id=:book', array(':cart' => $cart->id, ':book' => $id));

		// If the item already exists, add another:
		if($item!==null) {
			$item->quantity = $item->quantity + 1;
		} else { // New item:
			$item = new CartContent();
			$item->cart_id = $cart->id;
			$item->book_id = $id;
			$item->quantity = 1;
		}

		// Save the item:
		$item->save();

		// Show the cart contents:
		$this->render('view',array(
			'model'=>$cart,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cart']))
		{
			$model->attributes=$_POST['Cart'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel()->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cart');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cart the loaded model
	 * @throws CHttpException
	 */
	public function loadModel()
	{

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

	/**
	 * Performs the AJAX validation.
	 * @param Cart $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
