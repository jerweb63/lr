<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<h1>Home</h1>
<p>Just a template.</p>

<?php
if(is_admin($session_user_id) === true) {
	echo 'Admin!';
}
?>

<?php include 'includes/overall/footer.php'; ?>