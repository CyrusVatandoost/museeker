<!--

	Last Updated:	2017 08 07 12:13

-->
<!DOCTYPE html>
<html>
<head>
	<title>MuSeeker | Login</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<?php

	// Clear a session if it exists.
	if(!isset($_SESSION)) {
		session_start();
		session_destroy();
	}

	// Error message.
	$error = NULL;

	// When 'log-in" is clicked
	if(isset($_POST['login'])) {

		// Get values from form
		$email = $_POST['email'];
		$password = $_POST['password'];

		include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
			
		// Get values from form.
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM account
				WHERE email LIKE '$email' AND password LIKE '$password' ";	
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$account_id = $row['account_id'];

			// Set values to session.
			session_start();
			$_SESSION['account_id'] = $account_id;
			$_SESSION['type']= $row['type'];

			$sql = "
					UPDATE account
					SET last_login = CURRENT_TIMESTAMP
					WHERE account_id LIKE '$account_id'
					";
			$conn->query($sql);

			// Go to another page
			header("Location: /museeker/home.php");

		}
		else {
			$error = "Incorrect email or password!";
		}

	}


	
?>

<center>	
<div class="login">
	<div class="middle">

		<h1>Login</h1>
		<br>
		
		<?php 

			if($error != NULL) {
				echo "<br><error>";
				echo $error;
				echo "</error><br>";
			}

		?>

		<br>

		<form method="post" action="<?php $_PHP_SELF ?>">
			<table class="form">
				<tr>
					<td>email
					<td><input name="email" type="text" required>
				<tr>
					<td>password
					<td><input name="password" type="password" required>
				<tr>
					<td>
					<td><input name="login" type="submit" value="log in" class="button">
				<tr>
					<td>
					<td><a href="/museeker/add/account.php">Register</a>
			</table>
		</form>

	</div>
</div>

</body>
</html>