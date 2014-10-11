<?php 
session_start();

require_once 'php-activerecord/ActiveRecord.php';

error_reporting(E_ALL);

define("BASE_URL", "http://localhost/projects/active_records_practice/");

foreach(glob("functions/*.php") as $functions) {
	include $functions;
}


ActiveRecord\Config::initialize(function($e) {
	$e->set_model_directory('model');
	$e->set_connections(array('development' => 'mysql://root:@localhost/login_db'));
});


dprint($_SESSION);

?>