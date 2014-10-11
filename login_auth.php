<?php 

require 'init.php';

if ( count($_POST) <= 0 ) {
	redirect('index.php');
}

$username = post_validate($_POST['username']);
$password = post_validate($_POST['password']);

$auth = Login::find_all_by_username_and_password($username, md5($password));
//echo count($auth);
dprint($auth);

if ( count($auth) == 1 ) {
	$_SESSION['is_logged'] = true;
	$_SESSION['userdata'] = serialize(array('id' => $auth[0]->id, 'username' => $auth[0]->username));
}

redirect(BASE_URL. "main.php");
?>