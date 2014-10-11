<?php 

include 'init.php';

if ( is_logged() ) {
	redirect('main.php');
}

?>
<h1>Login</h1>
<form name="login_form" id="login_form" class="login_form" method="post" action="login_auth.php">
	<p>Username: <input type="text" name="username"></p>
	<p>Password: <input type="password" name="password"></p>
	<p><input type="submit" value="Login"> - <a href="<?php echo BASE_URL ?>register.php">register</a></p>
</form>