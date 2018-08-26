<!--

    Last Updated:   2017 08 12 14:19

-->
<html>
<head>
	<title>MuSeeker | Edit Account</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";

    session_start();
    if($_SESSION['account_id'] != NULL)
        $account_id = $_SESSION['account_id'];
    else
        header("Location: /museeker/login.php");
	
	// SQL
	$sql = "SELECT *
			FROM account
			LEFT JOIN artist
			ON account.account_id = artist.account_id
			WHERE account.account_id LIKE '$account_id' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$artist_name = $row['artist_name'];
				$email = $row['email'];
				$password = $row['password'];
				$type = $row["type"];
		}
	}
	else
		echo "Invalid email or password.<br>";

	// Update
	if(isset($_POST['update'])) {

		if($_POST['firstname'] != null)
			$firstname =  $_POST['firstname'];

		if($_POST['lastname'] != null)
			$lastname =  $_POST['lastname'];

		if($_POST['email'] != null)
			$email =  $_POST['email'];
		
		if($_POST['password'] != null)
			$password =  $_POST['password'];

		$sql = "UPDATE account
				SET firstname='$firstname', lastname='$lastname', email='$email', password='$password'
				WHERE account_id='$account_id';";
		$conn->query($sql);

		if($type == "artist") {
			if($_POST['artist_name'] != null) {
				$artist_name =  $_POST['artist_name'];
				$sql = "UPDATE artist
						SET artist_name = '$artist_name'
						WHERE account_id = '$account_id';";
				$conn->query($sql);
			}
		}
	}

?>

<center>
<div class="parent">

    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/sidemenu.php"; ?>

    <div class="container">

        <div class="box" id="header">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

        <div class="box" id="title">
            Edit Profile
        </div>

		<div class="box" id="body">
			<form method="post" action="<?php $_PHP_SELF ?>">
			<table class="form">
				<tr>
					<td>First Name:
					<td><input name="firstname" type="text" placeholder="<?php echo $firstname ?>">
				<tr>
					<td>Last Name:
					<td><input name="lastname" type="text" placeholder="<?php echo $lastname ?>">
				<?php
					if($type == "artist") {
						echo "<tr><td>Artist Name:";
						echo "<td><input name=artist_name type=text placeholder=$artist_name>";
					}
				?>
				<tr>
					<td>Email:
					<td><input name="email" type="text" placeholder="<?php echo $email ?>">
				<tr>
					<td>Password:
					<td><input name="password" type="password">
				<tr>
					<td><td><input name="update" type="submit" value="update" class="button">
			</table>
			</form>
		</div>

		<div class="box" id="body">
			<form action="/museeker/php/upload/account_img.php?account_id=<?php echo $account_id ?>" method="post" enctype="multipart/form-data">
			<table class="form">
				<tr>
					<td>Update Profile Picture:
				<tr>
					<td><input type="file" name="fileToUpload" id="fileToUpload">
				<tr>
					<td><input type="submit" value="Upload Image" name="submit">
			</table>
		</form>
		</div>

    </div>

</div>

</body>
</html>