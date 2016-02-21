<?php

namespace Fuel\Migrations;

class Add_userid_to_projects
{
	public function up()
	{
		\DBUtil::add_fields('projects', array(
			'userid' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('projects', array(
			'userid'

		));
	}
}