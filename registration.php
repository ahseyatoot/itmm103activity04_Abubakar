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
<h2><center>REGISTRATION FORM:</center> <br><br></h2>
<p><center><span class="error">* required field</center></span></p>
    <form method="post" action="">
	<center>USERNAME: <input type="text" name="name"></center>
	<center><span class="error">* <?php echo $nameErr;?></center></span>
	<br><br>
	<center>PASSWORD: <input type="password" name="password"></center>
	<center><span class="error">* <?php echo $passwordErr;?></center></span>
<?php
 $password_length = 6;
function password_strength($password) {
	$returnVal = True;
	if ( strlen($password) < $password_length ) {
		$returnVal = False;
		$password="Password should be 6 characters long!";
	}
	if ( !preg_match("#[0-7]+#", $password) ) {
		$returnVal = False;
		$password="Password must have at least one number!";
	}
	if ( !preg_match("#[A-Z]+#", $password) ) {
		$returnVal = False;
		$password="Password must have at least 1 uppercase letter!";
	}
	if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password) ) {
		$returnVal = False;
		$password="Password should have at least 1 special character!";
	}
	return $returnVal;
}		
		?>	
	<br><br>
	<center>CONFIRM PASSWORD: <input type="password" name="cpassword"></center>
	<center><span class="error">* <?php echo $cpasswordErr;?></center></span>
	<br><br>
	<center>EMAIL: <input type="text" name="email"></center>
	<center><span class="error">* <?php echo $emailErr;?></center></span>
	<br><br>
	<center>CONFIRM EMAIL: <input type="text" name="cemail"></center>
	<center><span class="error">* <?php echo $cemailErr;?></center></span>
	<br><br>
	<center>CONTACT NUMBER: <input type="number" name="contact"></center>
	<br><br>
	<center><input type="submit" name="submit" value="LOGIN"></center>
	<br><br>
	
</br>
</form>
</body>
</html>