<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property string $id
 * @property string $customer_session_id
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property CartContent[] $cartContents
 */
class Cart extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cart';
	}

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
			array('date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customer_session_id, date_modified', 'safe', 'on'=>'search'),
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
			'cartContents' => array(self::HAS_MANY, 'CartContent', 'cart_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'customer_session_id' => 'Customer Session',
			'date_modified' => 'Date Modified',
		);
	}

	public function getContents()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('cart_id',$this->id, true);
		return new CActiveDataProvider('CartContent', array(
			'criteria'=>$criteria,
		));
	}

	public function getTotal()
    {

    	$id = $this->id;
		$cmd = Yii::app()->db->createCommand('SELECT SUM(quantity * book.price) FROM cart_content JOIN book ON book_id=book.id WHERE cart_id=:id');
		$cmd->bindParam(':id', $id, PDO::PARAM_INT);
		return $cmd->queryScalar();
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
		$criteria->compare('customer_session_id',$this->customer_session_id,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function clear()
	{
		$cmd = Yii::app()->db->createCommand('DELETE FROM cart_content WHERE cart_id=:cart_id');
		$cart_id = $this->id;
		$cmd->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
		$cmd->execute();
		$cmd = Yii::app()->db->createCommand('DELETE FROM cart WHERE id=:cart_id');
		$cmd->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
		$cmd->execute();
	}

}
