<?php
/**
 * The staging database settings. These get merged with the global settings.
 */
if (preg_match($dbConfigPattern, $_SERVER["CLEARDB_DATABASE_URL"], $matches)) {
    list($dbConfig, $dbuser, $dbpass, $dbhost, $dbport, $dbname) = $matches;
    
    return array(
        'default' => array(
            'connection'  => array(
                'dsn'        => 'mysql:host='.$dbhost.';dbname='.$dbname,
                'username'   => $dbuser,
                'password'   => $dbpass,
            ),
        ),
    );
}
