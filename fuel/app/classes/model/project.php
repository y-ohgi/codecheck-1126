<?php

class Model_Project extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'url',
		'title',
		'description',
		'imagepath',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'projects';

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('url', 'URL', 'valid_url');
        $val->add_field('title', 'Title', 'required');
        $val->add_field('description', 'Description', 'required');
        return $val;
    }
    
}
