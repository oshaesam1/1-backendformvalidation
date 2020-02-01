

<?php
$firstnameErr = $emailErr = $lastnameErr = "";
$firstname = $email = $lastname =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]); 
}
    // check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$ /", $firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
}
    // check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
}
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }

  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
		<form>
				<form class="form"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
					<label> first name: </label> <br> <br> 
				<input type="text" name="firstname" placeholder="enter full name " >
				  <span class="error">* <?php echo
				   $firstnameErr;?></span>

				<br> <br>
					<label> last name: </label> <br> <br> 
				<input type="text"  name="lastname">
					  <span class="error">* 
					  	<?php echo $lastnameErr ;?></span>

				<br> <br>
					<label >Email: </label> <br> <br> 
				<input type="required" name="email" placeholder="enter full name "  value="@gmail.com">
			      <span class="error"> * <?php echo $emailErr;?></span>
			     <br> <br>
					<label> phone number: </label> <br> <br>
				<input type="number" min ="11" max="11" >
				<br>
				<br><br> 
				<form action="upload.php" method="post" enctype="multipart/form-data">
                   Select image to upload:
                   <input type="file" name="fileToUpload" id="fileToUpload">
                   <input type="submit" value="Upload Image" name="submit">
                   </form>
				<input class="sumbit" type="submit" value = "Submit" >
	   </form>
</body>
</html>
