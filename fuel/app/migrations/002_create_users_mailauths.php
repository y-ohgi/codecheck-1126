<?php

namespace Fuel\Migrations;

class Create_users_mailauths
{
	public function up()
	{
		\DBUtil::create_table('users_mailauths', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'uuid' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_mailauths');
	}
}