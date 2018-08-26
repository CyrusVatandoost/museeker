<?php
	
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";	

    $album_id = $_GET['album_id'];
    $song_id = $_GET['song_id'];

	$sql = "
			INSERT INTO album_content (album_id, song_id)
			VALUES ('$album_id', '$song_id')
			";
	$result = $conn->query($sql);

	if($result) {
		echo "ADDED SOMETHING";

		// Go to another page
		header("Location: /museeker/album.php?album_id=$album_id");
		exit;
	}
	else
		echo "SOMETHING BAD HAPPENED";

?>