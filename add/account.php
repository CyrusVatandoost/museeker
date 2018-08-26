<!--

	Last Updated:	2017 08 07 12:12

-->
<!DOCTYPE html>
<html>
<head>
	<title>MuSeeker | Register</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";

	$error = "";

	// Connect to DB
	if(isset($_POST['add'])) {

		// Get values
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$type = $_POST['account_type'];

		include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
		
		// Get values
		$password = $_POST['password'];
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$type = $_POST['account_type'];

	    $sql = "SELECT * FROM account WHERE email LIKE '$email' ";
	    $result = $conn->query($sql);

	    // If email address is taken
	    if($result->num_rows > 0) {
			$error = "<error>Email has been taken.</error><br><br>";
	    }
	    else if($result->num_rows == 0) {

			// SQL
			$sql = "INSERT INTO account (password, email, firstname, lastname, type, date_registered)
					VALUES ('$password', '$email', '$firstname', '$lastname', '$type', CURRENT_DATE)";
			
			// Check SQL
			if ($conn->query($sql) === TRUE) {
				echo "New account created successfully<br>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			// SQL
			$sql = "SELECT account_id FROM account ORDER BY account_id DESC LIMIT 1;";
			$result = $conn->query($sql);
			
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc())
					$account_id = $row["account_id"];
			}
			
			// Create a new User
			if($type == "user") {
				$sql = "INSERT INTO user (account_id) VALUES ('$account_id');";
				$result = $conn->query($sql);
				echo "Created a new User<br>";
			}
			// Create a new Artist
			else if($type == "artist") {
				$sql = "INSERT INTO artist (account_id) VALUES ('$account_id');";
				$result = $conn->query($sql);
				echo "Created a new Artist<br>";
			}

			// Go to another page
			header("Location: /museeker/login.php");

	    }


	}

?>

<center>
<div class="login">
<h1>
	Create New Account
</h1>

<br><br><?php echo $error ?>

<form method="post" action="<?php $_PHP_SELF ?>">
	<table class="login">
		<tr class="table_login" align="right">
			<td class="table_login">first name</td>
			<td class="table_login">
				<input name="firstname" type="text" id="firstname" required>
			</td>
		</tr>
		<tr class="table_login" align="right">
			<td class="table_login" width="">last name</td>
			<td class="table_login">
				<input name="lastname" type="text" id="lastname" required>
			</td>
		</tr>
		<tr class="table_login" align="right">
			<td class="table_login" width="">email</td>
			<td class="table_login">
				<input name="email" type="text" id="email" required>
			</td>
		</tr>
		<tr align="right">
			<td class="table_login">password</td>
			<td class="table_login">
				<input name="password" type="password" id="password" required>
			</td>
		</tr>
		<tr align="right">
			<td class="table_login">account type</td>
			<td class="table_login" align="left">
				<input type="radio" name="account_type" value="user" checked>user
				<input type="radio" name="account_type" value="artist">artist
			</td>
		</tr>
		<tr class="table_login">
			<td class="table_login" width=""></td>
			<td class="table_login">
				<input name="add" type="submit" id="add" value="create new account" class="button">
			</td>
		</tr>
	</table>
</form>
</div>

<div class="footer"> 
	<a href="/museeker/login.php">Login</a>
</div>

</body>
</html>