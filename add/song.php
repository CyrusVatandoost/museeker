<html>
<head>
	<title>Upload Song</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";

    session_start();
    if($_SESSION['account_id'] != NULL)
        $account_id = $_SESSION['account_id'];
    else
        header("Location: /museeker/login.php");

    // SQL
    $sql = "SELECT * FROM account WHERE account_id LIKE $account_id ";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
    }

    // Connect to DB
	if(isset($_POST['upload'])) {

    	include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/artist_check.php";
		
		// Get values
		$song_title = $_POST['song_title'];
		$genre_id = $_POST['genre_id'];

		// SQL
		$sql = "INSERT INTO song (song_title, artist_id, genre_id, upload_date)
				VALUES ('$song_title', '$artist_id', '$genre_id', CURRENT_DATE)";
		
		// Check SQL
		if ($conn->query($sql) === TRUE) {
			$message = "<div class=message>Successfully uploaded a song!</div>";

			$sql = "SELECT *
					FROM song
					ORDER BY song_id DESC
					LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$song_id = $row[song_id];

			// Go to another page
			header("Location: /museeker/edit/song.php?song_id=$song_id");
			exit;	

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

?>

<center>
<div class="parent">

    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/sidemenu.php"; ?>

    <div class="container">

        <div class="box" id="header">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

        <div class="box" id="title">
            Upload Song
        </div>

        <div class="box" id="body">
			<form method="post" action="<?php $_PHP_SELF ?>">
				<table class="form" border="0" cellspacing="1" cellpadding="2">
					<tr>
						<td>song title
						<td>
							<input name="song_title" type="text">
					<tr>
						<td>genre</td>
						<td>
							<select name="genre_id" class="dropdown">
								<?php

									// SQL
									$sql = "SELECT * FROM genre";
									$result = $conn->query($sql);

									// Result
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											echo "<option value=$row[genre_id] class=dropdown-content>$row[genre_name]</option>";
										}
									}
									
								?>
							</select>
					<tr>
						<td>
						<td>
							<input name="upload" type="submit" id="add" value="upload song" class="button">
				</table>
			</form>
		</div>

    </div>

</div>

</body>
</html>