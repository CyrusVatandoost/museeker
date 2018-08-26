<!--

    Last Updated:   2017 08 13 09:06

-->
<html>
<head>
	<title>MuSeeker | Upload Album</title>
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

    $album_id = $_GET['album_id'];

    // SQL to get first name
    $sql = "SELECT * FROM account WHERE account_id LIKE $account_id ";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
    }

    // SQL to get artist_id
	$sql = "SELECT * FROM artist WHERE account_id LIKE '$account_id'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$artist_id = $row['artist_id'];
	}

	if(isset($_POST['upload'])) {

		$song_title = $_POST['song_title'];
		$genre_id = $_POST['genre_id'];

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
			$conn->query($sql);

	        //header("Location: /museeker/php/add/album_songs.php?album_id=".$album_id);
		}
		else {
			echo "Error: Uploading new song failed.";
		}

	}

?>

<center>
<div class="parent">

    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/sidemenu.php"; ?>

    <div class="container">

        <div class="box" id="header">
            Add Songs to Album
        </div>

        <div class="box" id="body">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

        <div class="box" id="body">
        	<?php
        		$sql = "SELECT * FROM album WHERE album_id LIKE '$album_id' ";
        		$result = $conn->query($sql);
        		if($result->num_rows > 0) {
        			$row = $result->fetch_assoc();
        			$album_title = $row['album_title'];
        			echo $album_title;
        		}
        		else {
        			echo "Error: Invalid Album!";
        		}
        	?>
        </div>

        <div class="box" id="body">
        	<form method="post" action="<?php $_PHP_SELF ?>">
        	<table class="form">
        		<tr>
        			<th>Number<th>Title<th>Genre
        		<?php
        			$num = 1;
        			$sql = "SELECT * FROM song
        					NATURAL JOIN genre NATURAL JOIN album_content
        					WHERE album_id LIKE '$album_id'
        					GROUP BY song_id";
        			$result = $conn->query($sql);
        			if($result) {
        				while($row = $result->fetch_assoc()) {
        				echo "<tr>";
        					$song_title = $row['song_title'];
        					$genre_name = $row['genre_name'];
        					echo "<td>";
        					echo $num++;
        					echo "<td>";
        					echo $song_title;
        					echo "<td>";
        					echo $genre_name;
        				}
        			}
        		?>
        		<tr>
        			<td><?php echo $num ?>
        			<td><input name="song_title" required>
        			<td><select name="genre_id">
        				<?php
							$sql = "SELECT * FROM genre";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo "<option value=$row[genre_id] class=dropdown-content>$row[genre_name]</option>";
								}
							}
        				?>
        		<tr>
        			<td><td><input class="button" name="upload" type="submit" value="Add Song">
        	</table>
        	</form>
        </div>

    </div>

</div>

</body>
</html>