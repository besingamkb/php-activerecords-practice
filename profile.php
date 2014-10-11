<?php

require 'init.php';
if ( ! is_logged()) redirect(BASE_URL."index.php");
$user = Users::find(id_logged());
?>


<h1><?php echo ucfirst(user_logged()); ?>'s Profile!</h1>
<p>Username: <strong><?php echo $user->username; ?></strong></p>
<ul>
	<li><a href="<?php echo BASE_URL ?>update_profile.php?update=username&id=<?php echo $user->id ?>&username=<?php echo $user->username ?>">update username</a></li>
	<li><a href="<?php echo BASE_URL ?>update_profile.php?update=password&id=<?php echo $user->id ?>">change password</a></li>
	<li><a href="<?php echo BASE_URL ?>logout.php">logout</a></li>
</ul>