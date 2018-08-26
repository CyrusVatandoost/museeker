<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";	

    $album_id = $_GET['album_id'];

    $sql = "
    		DELETE
    		FROM album
    		WHERE album_id LIKE '$album_id'
    		";
	$result = $conn->query($sql);

	if($result)
		echo "SOMETHING GOOD HAPPENED<br>";
	else
		echo "SOMETHING BAD HAPPENED<br>";

	if($result) {
		header("Location: /museeker/account/account.php");
		exit;	
	}
	else
		echo "SOMETHING BAD HAPPENED<br>";

?>