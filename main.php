<?php

require 'init.php';
if (! is_logged() ) {
	redirect('index.php');
}
?>
<h1>Hello! </h1><h5> Welcome back <?php echo ucfirst(user_logged()) ?>.	</h5>
<ul>
	<li><a href="<?php echo BASE_URL ?>profile.php?id=<?php echo id_logged(); ?>">View Profile</a></li>
	<li><a href="<?php echo BASE_URL ?>users.php">User's List</a></li>
	<li><a href="<?php echo BASE_URL ?>logout.php">logout</a></li>
</ul>
