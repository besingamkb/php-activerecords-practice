<?php require 'init.php';

$users = Users::find('all', array('order' => 'id desc'));
?>


<table>
	<tr>
		<th>id</th>
		<th>username</th>
	</tr>
	<?php foreach($users as $user): ?>
	<tr>
		<td><?php echo $user->id ?></td>
		<td><?php echo $user->username ?></td>
	</tr>
	<?php endforeach; ?>
</table>