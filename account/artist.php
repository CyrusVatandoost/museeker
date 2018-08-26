<html>
<head>
	<title>Artist Page</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<center>
<div class="header">
	<h1>Artist Page</h1>
</div>

<?php

	// Get vars from last page using session
	session_start();
	$account_id = $_SESSION['account_id'];

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/links.php";

	$sql = "SELECT * FROM artist WHERE account_id LIKE $account_id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$artist_id = $row['artist_id'];
	$_SESSION['artist_id'] = $artist_id;

	
?>

<div class="main">
<a href="\museeker\add\song.php">Upload Song</a> | 
<a href="\museeker\add\album.php">Upload Album</a>
</div>

<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist/song.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist/album.php";
	include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/footer.php";

?>

</body>
</html>