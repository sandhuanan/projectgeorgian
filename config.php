<?php
session_start();
// Change this to your connection info.


$DB_HOST = 'db5000358037.hosting-data.io';
$DB_USER = 'dbu107825';
$DB_PASS = 'Bhangu.20';
$DB_NAME = 'dbs347904';

// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>