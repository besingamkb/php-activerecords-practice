<?php 

require_once 'php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($e) {
	$e->set_model_directory('model');
	$e->set_connections(
		array(
			'development' => 'mysql://root:@localhost/sakila'
		)
	);
});

$films = Test::find('all');

echo count($films);

echo "<pre>";
print_r($films);

?>