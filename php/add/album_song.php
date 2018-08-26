<?php

	if(isset($_POST['upload'])) {

		$song_title = $_POST[$song_title];
		$genre_id = $_POST[$genre_id];

		$sql = "INSERT INTO song (song_title, artist_id, genre_id, upload_date)
				VALUES ('$song_title', '$artist_id', '$genre_id', CURRENT_DATE)";
		$result = $conn->query($sql);
		if($result) {
			// SQL to get song_id
			$sql = "SELECT * FROM song
					ORDER BY song_id DESC
					LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$song_id = $row['song_id'];

			$sql = "INSERT INTO album_content (album_id, song_id)
					VALUES ('$album_id', '$song_id')";
			$result = $conn->query($sql);
			if($result) {
		        header("Location: /museeker/edit/album_add_song.php?album_id=".$album_id);
			}
			else {
				echo "Error: Adding into album_content failed.";
			}

		}
		else {
			echo "Error: Uploading new song failed.";
		}

	}

?>