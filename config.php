<?php
require 'environment.php';

global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'cielo';
	$config['host'] = 'localhost:3306';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '247845';
} else {
	$config['dbname'] = 'cielo';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}
?>