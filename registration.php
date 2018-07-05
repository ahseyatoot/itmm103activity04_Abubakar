<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $passwordErr = $cpasswordErr = $emailErr = $cemailErr = $contactErr = "";
$name = $password = $cpassword = $email = $cemail = $contact = "";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["name"])) {
		$nameErr = "Name is required!";
	}
	else{
	$name = test_input($_POST["name"]);
	}
	if (empty($_POST["password"])) {
		$passwordErr = "Password is required!";
	}
	else{
		$password = test_input($_POST["password"]);		
	}
	if (empty($_POST["cpassword"])) {
		$cpasswordErr = "This is required!";
	}
	else{
		$cpassword = test_input($_POST["cpassword"]);
	}
	if (empty($_POST["email"])) {
		$emailErr = "Email is required!";
	}
	else{
		$email = test_input($_POST["email"]);
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $emailErr = "Invalid email format"; 
		 }
	}
	if (empty($_POST["cemail"])) {
		$cemailErr = "This is required!";
	}
	else{
		$cemail = test_input($_POST["cemail"]);
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $cemailErr = "Invalid email format"; 
		 }
	}
	if (empty($_POST["contact"])) {
		$contact = "";
	}
	else{
		$contact = test_input($_POST["contact"]);
	}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>
<h2>REGISTRATION FORM: <br><br></h2>
<p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	USERNAME: <input type="text" name="name">
	<span class="error">* <?php echo $nameErr;?></span>
	<br><br>
	PASSWORD: <input type="password" name="password">
	<span class="error">* <?php echo $passwordErr;?></span>
	<br><br>
	CONFIRM PASSWORD: <input type="password" name="cpassword">
	<span class="error">* <?php echo $cpasswordErr;?></span>
	<br><br>
	EMAIL: <input type="text" name="email">
	<span class="error">* <?php echo $emailErr;?></span>
	<br><br>
	CONFIRM EMAIL: <input type="text" name="cemail">
	<span class="error">* <?php echo $cemailErr;?></span>
	<br><br>
	CONTACT NUMBER: <input type="number" name="contact">
	<br><br>
	<input type="submit" name="submit" value="Submit">
	
	<br><br>
	
</br>
</form>

</body>
</html>