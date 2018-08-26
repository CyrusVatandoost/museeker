<?php

	session_start();
	$account_id = $_SESSION['account_id'];

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";

	$playlist_id = $_GET['playlist_id'];
	$song_id = $_GET['song_id'];

	$sql = "INSERT INTO playlist_content (playlist_id, song_id)
			VALUES ('$playlist_id', '$song_id') ";
	$result = $conn->query($sql);

	echo "<script>window.close();</script>";
	
?>