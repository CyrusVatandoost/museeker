<?php

	if(isset($_POST['create'])) {

		$sql = "SELECT * FROM artist WHERE account_id LIKE '$account_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$artist_id = $row['artist_id'];
		}

		$album_title = $_POST['album_title'];
		$year = $_POST['year'];
		$album_description = $_POST['album_description']; 

		$sql = "INSERT INTO album (album_title, artist_id, year, album_description)
				VALUES ('$album_title', '$artist_id', '$year', '$album_description')";
		$result = $conn->query($sql);

		if($result) {
			$sql = "SELECT * FROM album ORDER BY album_id DESC LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$album_id = $row['album_id'];

			header("Location: /museeker/edit/album_add_song.php?album_id=".$album_id);
		}
		else {
			echo "Error: Creating new album failed.";
		}
	}

?>

<div class = "box" id="body">
<form method="post" action="<?php $_PHP_SELF ?>">
<table class="form">
	<tr>
		<td>Album Title
		<td>
			<input name="album_title" type="text" required>
	<tr>	
		<td>Year
		<td>
			<input name="year" type="text" required>
	<tr>
		<td>Description
		<td>
			<textarea name="album_description" rows="5"></textarea>
	<tr>
		<td>
		<td>
			<input name="create" type="submit" value="create" class="button">
</table>
</form>
</div>