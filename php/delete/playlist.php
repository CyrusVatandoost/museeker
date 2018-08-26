<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";	

    $playlist_id = $_GET['playlist_id'];

    $sql = "
    		DELETE
    		FROM playlist
    		WHERE playlist_id LIKE '$playlist_id'
    		";
	$result = $conn->query($sql);

	if($result) {
		header("Location: /museeker/account/account.php");
	}
	else
		echo "SOMETHING BAD HAPPENED";

?>