<?php
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];

	$errorEmpty = false;
	$errorEmail = false;

	if (empty($name)) {
		echo "<span>Fill in all the fields!</span>";
	}
}
?>
