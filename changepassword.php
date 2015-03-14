<?php
include 'core/init.php';
protect_page();

if(empty($_POST) === false) {
	$required_fields = array(
			'current_password', 
			'password', 
			'password_again'
			);
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required.';
			break 1;
		}
	}
	
	if(md5($_POST['current_password']) === $user_data['password']) {
		if(trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Your new passwords do not match.';
		} else if(strlen($_POST['password']) < 6) {
			$errors[] = 'Your passwords must be at least 6 characters.';
		}
	} else {
		$errors[] = 'Your current password is incorrect.';
	}
}

include 'includes/overall/header.php';
?>
<h1>Change Password</h1>

<?php 
if(empty($_POST) === false && empty($errors) ===true) {
	
} else if(empty($errors) === false) {
	echo output_errors($errors);
}
?>

<form action="" method="post">
	<ul>
		<li>
			Current password*:<br>
			<input type="text" name="current_password">
		</li>
		<li>
			New password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			New password again*:<br>
			<input type="password" name="password_again">
		</li>
		<li>
			<input type="submit" value="Change password">
		</li>
	</ul>
</form>

<?php include 'includes/overall/footer.php';
