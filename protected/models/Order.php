<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $id
 * @property string $customer_id
 * @property string $charge_id
 * @property string $total
 * @property string $date_entered
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property OrderContent[] $orderContents
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, payment_id, total, date_entered', 'required'),
			array('customer_id, total', 'length', 'max'=>10),
			array('payment_id', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customer_id, payment_id, total, date_entered', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'orderContents' => array(self::HAS_MANY, 'OrderContent', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Order Number',
			'customer_id' => 'Customer',
			'payment_id' => 'Payment',
			'total' => 'Total',
			'date_entered' => 'Date Entered',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('customer_id',$this->customer_id,true);
		$criteria->compare('payment_id',$this->charge_id,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('date_entered',$this->date_entered,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function afterSave()
	{
		// Store the order contents in the order contents table:
		$cart = Utilities::getCart();
		$cmd = Yii::app()->db->createCommand('INSERT INTO order_content (order_id, book_id, quantity, price_per) SELECT :order_id, cc.book_id, cc.quantity, b.price FROM cart_content AS cc, book AS b WHERE (b.id=cc.book_id) AND (cc.cart_id=:cart_id)');
		$order_id = $this->id;
		$cart_id = $cart->id;
		$cmd->bindParam(':order_id', $order_id, PDO::PARAM_INT);
		$cmd->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
		$cmd->execute();
	}
}
