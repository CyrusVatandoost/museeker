<!DOCTYPE html>
<html>
<head>
	<title>MuSeeker</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<?php

	// Go to another page
	header("Location: /museeker/login.php");

?>

<center>
<div class="title">
		<h1>MuSeeker</h1>
	<br>
	<br>
	<a href="/museeker/log_in.php">log-in</a><br>
	<a href="/museeker/add/account.php">sign-up</a>
</div>

</body>
</html>