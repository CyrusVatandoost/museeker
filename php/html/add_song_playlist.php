<?php 

	function addSongToPlaylist($playlist_id, $song_id) {
		echo "Adding song to plalist";

		$sql = "INSERT INTO playlist_content (playlist_id, song_id)
				VALUES ('$playlist_id', '$song_id') ";
		$conn->query($sql);

		echo "Done!";
	}

	$sql = "SELECT * FROM playlist WHERE account_id LIKE '$account_id' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<div class=box>";
		echo "<div class=b_dropdown>";
		echo "<button onclick=myfunction() class=b_dropbtn>Add to Playlist</button>";
		echo "<div id=mydropdown class=b_dropdown_content>";
		while($row = $result->fetch_assoc()) {
			$playlist_id = $row['playlist_id'];
			//echo "<a href=addSongToPlaylist($playlist_id, $song_id) >";
			echo "<a href=/museeker/php/add/playlist_song.php?playlist_id=$playlist_id&song_id=$song_id target=_blank>";
			echo $row['playlist_name'];
			echo "</a>";
		}
		echo "</div></div></div>";
	}

?>