<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";	

    $song_id = $_GET['song_id'];

    $sql = "
    		DELETE
    		FROM song
    		WHERE song_id LIKE '$song_id'
    		";
	$result = $conn->query($sql);

	if($result) {
		header("Location: /museeker/account/account.php");
	}
	else
		echo "SOMETHING BAD HAPPENED";

?>