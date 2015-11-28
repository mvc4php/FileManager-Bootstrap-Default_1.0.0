<?php

// class variables as array
$vars = array('id', 'firma', 'firstname', 'lastname', 'status', 'contact');
// types from class variables as array
$typs = array('int', 'string', 'string', 'string', 'string', 'string');

// for search field
$search = 'lastname';
$search_type = 'string';

// for read.php ( all reading is in more.php )
$index = array("Firma", "Firstname", "Lastname");


// amount for while loop.
$anzahl_vars = count($vars);
$anzahl_typs = count($typs);

// model classes settings
$klassenname = 'Customer';

