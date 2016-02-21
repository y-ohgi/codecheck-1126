<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

    'gacha' => 'profiles/gacha',
    'profiles/create' => 'profiles/create',
    'profiles/:id' => 'profiles/index',
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
