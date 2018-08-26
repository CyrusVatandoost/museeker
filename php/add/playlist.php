<?php

	if(isset($_POST['create'])) {

		// Get values from form
		$playlist_name = $_POST['playlist_name'];
		$public = $_POST['public'];
		$playlist_description = $_POST['playlist_description'];

		// SQL
		$sql = "INSERT INTO playlist (playlist_name, account_id, playlist_description, public)
				VALUES ('$playlist_name', '$account_id', '$playlist_description', '$public')";
		$conn->query($sql);

		$sql = "SELECT * FROM playlist ORDER BY playlist_id DESC LIMIT 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$playlist_id = $row['playlist_id'];

		header("Location: /museeker/playlist.php?playlist_id=$playlist_id");
	}

?>

<div class="box">
<form method="post" action="<?php $_PHP_SELF ?>">
<table class="form">
	<tr>
		<td>name
		<td><input name="playlist_name" type="text" required="true" maxlength="100" required>
	<tr>
		<td>
		<td><input type="radio" name="public" value="1" checked>public
			<input type="radio" name="public" value="0">private
	<tr>
		<td>description
		<td><textarea name="playlist_description" rows="5" maxlength="300"></textarea>
	<tr>
		<td>
		<td><input name="create" type="submit" value="create" class="button">
</table>
</form>
</div>