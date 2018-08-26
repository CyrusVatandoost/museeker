<html>
<head>
	<title>Admin Page</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<center>
<div class="header">
	<h1>Admin Page</h1>
</div>

<?php

	// Get vars from last page using session
	session_start();
	$account_id = $_SESSION['account_id'];
	$type = $_SESSION['type'];

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/links.php";

?>

<div class="main">
<center>
	Select:<br>
	<a href="/museeker/select/all.php">all</a> | 
	<a href="/museeker/select/account.php">account</a> | 
	<a href="/museeker/select/user.php">user</a> | 
	<a href="/museeker/select/artist.php">artist</a> | 
	<a href="/museeker/select/song.php">song</a> | 
	<a href="/museeker/select/album.php">album</a> | 
	<a href="/museeker/select/history.php">history</a> | 
	<a href="/museeker/select/genre.php">genre</a><br>
	<br>Add:<br>
	<a href="/museeker/add/account.php">account</a> | 
	<a href="/museeker/add/song.php">song</a> | 
	<a href="/museeker/add/genre.php">genre</a><br>
</div>

<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/footer.php"; ?>

</body>
</html>