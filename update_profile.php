<?php include 'init.php';

$error = array();

if ( isset($_GET['save_update']) and !empty($_GET['save_update']) and $_GET['save_update'] == 'username' and isset($_GET['id']) ) {
	dprint($_POST);
	$update = Users::find($_GET['id']);

	$check_user = Users::find_all_by_username(post_validate($_POST['username']));
	if ( count($check_user) > 0 ) {
		$error[] = post_validate($_POST['username'])." is already exist";
	} elseif ( empty(post_validate($_POST['username'])) or post_validate($_POST['username'] == "") )  {
		$error[] = "username is require.";
	} else {
		$update->username = post_validate($_POST['username']);
		$update->save();
		echo "<p>Update successfuly - " . "<a href=".BASE_URL."profile.php>view profile</a>" . "</p>";
	}	
} elseif ( isset($_GET['save_update']) and !empty($_GET['save_update']) and $_GET['save_update'] == 'password' and isset($_GET['id']) ) {
	if ( isset($_POST['current_password']) and !empty($_POST['current_password']) ) {
		$check_password = Users::find_all_by_password_and_id(md5(post_validate($_POST['current_password'])), $_GET['id']);
		if ( count($check_password) != 1 ) {
			$error[] = "wrong current password";
		}

		if ( isset($_POST['new_password']) and !empty(post_validate($_POST['new_password'])) and isset($_POST['confirm_password']) ) {
			if ( post_validate($_POST['new_password']) != post_validate($_POST['confirm_password']) ) {
				$error[] = "password not match";
			}
			$newPass = Users::find($_GET['id']);
			$newPass->password = md5(post_validate($_POST['new_password']));
			$newPass->save();
			echo "<p>Update successfuly - " . "<a href=".BASE_URL."profile.php>view profile</a>" . "</p>";
		} else {
			$error[] = "new password is require";
		}

	}
	
}
if ( count($error) != 0 ) {
	foreach ($error as $errors) {
		# code...
		echo $errors . "<br />";
	}
	echo " <a href=" . $_SERVER['HTTP_REFERER'] . ">go back</a>";
}

?>


<?php if ( isset($_GET['update']) and $_GET['update'] == 'username' and isset($_GET['username']) ): ?>
	<h1>Update your username</h1>
	<form method="post" action="<?php echo BASE_URL; ?>update_profile.php?save_update=username&id=<?php echo $_GET['id'] ?>">
		<p>Username: <input type="text" name="username" value="<?php echo $_GET['username'] ?>"></p>
		<p><input type="submit" value="save changes"> - <a href="<?php echo BASE_URL ?>profile.php">go back</a></p>
	</form>
<?php endif; ?>

<?php if ( isset($_GET['update']) and $_GET['update'] == 'password' ): ?>
	<h1>Change your password</h1>
	<form method="post" action="<?php echo BASE_URL; ?>update_profile.php?save_update=password&id=<?php echo $_GET['id'] ?>">
		<p>Current Password: <input type="password" name="current_password"></p>
		<p>New Password: <input type="password" name="new_password"></p>
		<p>Confirm Password: <input type="password" name="confirm_password"></p>
		<p><input type="submit" value="save changes"> - <a href="<?php echo BASE_URL ?>profile.php">go back</a></p>
	</form>
	
<?php endif; ?>