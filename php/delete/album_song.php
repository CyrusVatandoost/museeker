<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";	

    $album_id = $_GET['album_id'];
    $song_id = $_GET['song_id'];

    $sql = "
    		DELETE
    		FROM album_content
    		WHERE album_id LIKE '$album_id'
    		AND song_id LIKE '$song_id'
    		";
	$result = $conn->query($sql);

	if($result) {
		echo "DELETED SOMETHING";

		// Go to another page
		header("Location: /museeker/edit/album_remove_song.php?album_id=$album_id");
		exit;	
	}
	else
		echo "SOMETHING BAD HAPPENED";

?>