<?php 

require 'init.php';

$username = post_validate($_POST['username']);
$password = post_validate($_POST['password']);

$error = array();

$username_check = Login::find_all_by_username($username);
if (count($username_check) == 1) {
	$error[] = "username already exist!";
} else {
	$newuser = Login::create(array('username' => $username, 'password' => md5($password)));
	redirect(BASE_URL."index.php");
}

foreach($error as $errors) {
	echo $errors . "<br />";
}

?>

