<?php

class m140122_205418_create_payment_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('payment', array(
			'id' => 'pk',
			'charge_id' => 'string NOT NULL',
			'email' => 'string NOT NULL',
			'amount' => 'integer UNSIGNED NOT NULL',
			'date_added' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP'
		));
		$this->createIndex('charge_id', 'payment', 'charge_id', true);
		$this->createIndex('email', 'payment', 'email');
		echo "The 'payment' table has been created.\n";
	}

	public function down()
	{
		$this->dropTable('payment');
		echo "The 'payment' table has been dropped.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
