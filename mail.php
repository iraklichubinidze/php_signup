<?php
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	$errorEmpty = false;
	$errorEmail = false;

	if (empty($name) || empty($lastname) || empty($email)) {
		echo "<span class='form-error'>Fill in all the fields!</span>";
		$errorEmpty = true;
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<span class='form-error'>Write a valid e-mail adress ! </span>";
		$errorEmail = true;
	}
	else {
		echo "<span class='form-success'>Registration completed successfully</span>";
	}
}
else {
	echo "There was an error!";
}
?>
<script>
	$("#mail-name, #mail-lastname,#mail-email").removeClass("input-error");

	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";

	if(errorEmpty == true){
		$("#mail-name, #mail-lastname, #mail-email").addClass("input-error");
	}
	if(errorMail == true){
		$("#mail-email").addClass("input-error");
	}
	if (errorEmpty==false && errorMail==false){
		$("#mail-name, #mail-lastname, #mail-email").val("");
	}
</script>
