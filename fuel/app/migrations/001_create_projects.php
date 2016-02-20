<?php

namespace Fuel\Migrations;

class Create_projects
{
	public function up()
	{
		\DBUtil::create_table('projects', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'url' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'imagepath' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('projects');
	}
}