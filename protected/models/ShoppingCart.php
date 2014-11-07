<?php

/**
 * This is the model class for "ShoppingCart".
 *
 * The followings are the available columns in table 'cart':
 * @property array $_items
 * @property string $customer_session_id
 */
class ShoppingCart extends CModel {

	public $customer_session_id;
	private $_items;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_session_id', 'required'),
			array('customer_session_id', 'length', 'max'=>32),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	public function attributeNames()
	{
		return array(
		);
	}

	public function setCustomerSessionId($value)
	{
		$this->customer_session_id = $value;
	}

	protected function afterConstruct() {

		parent::afterConstruct();
		// Check the session

		// Check the array

	}

}
