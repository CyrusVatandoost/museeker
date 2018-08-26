<html>
<head>
	<title>MuSeeker | Edit Song</title>
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

	$song_id = $_GET['song_id'];

    // SQL
	$sql = "SELECT * 
			FROM song
			WHERE song_id LIKE '$song_id' ";
	$result = $conn->query($sql);
	
	// Result
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
				$song_title = $row['song_title'];
				$genre_id = $row['genre_id'];
		}
	}

	if(isset($_POST['edit'])) {

			if($_POST['song_title'] != null)
				$song_title = $_POST['song_title'];

			if($_POST['genre_id'] != null)
				$genre_id = $_POST['genre_id'];

			$sql = "UPDATE song SET song_title = '$song_title', genre_id = '$genre_id' WHERE song_id = '$song_id'";
			$conn->query($sql);
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
            Edit Song
        </div>

    <?php
      
	    $sql = "SELECT *
	            FROM song NATURAL JOIN genre NATURAL JOIN artist
	            WHERE song_id LIKE '$song_id' ";
	    $result = $conn->query($sql);

	    // Display SQL results
	    if ($result->num_rows > 0) {
	        echo "<div class=box id='body'>";
	        echo "<table class=search>";
	        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/song/$song_id.jpg"))
	            echo "<tr><td rowspan=6 align=center class=min><img src=/museeker/resources/img/song/$song_id.jpg class=square></tr>";
	        else
	            echo "<tr><td rowspan=6 align=center class=min><img src=/museeker/resources/img/song/default.jpg class=square></tr>";
	        while($row = $result->fetch_assoc()) {
	            echo "<tr><td>Song:</td><td>$row[song_title]</td>";
	            echo "<tr><td>Artist:</td><td>$row[artist_name]</td>";    
	            echo "<tr><td>Genre:</td><td>$row[genre_name]</td>";
	            echo "<tr><td>Plays:</td><td>$row[plays]</td>";
	            echo "</tr>";
	        }
	        echo "</table></div>";
	    }

	    echo "<div class=box id='body'>";
	        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/mp3/$song_id.mp3"))
	            echo "<audio controls><source src=/museeker/resources/mp3/$song_id.mp3 type=audio/mpeg></audio>";
	        else
	            echo "<audio controls><source src=/museeker/resources/mp3/default.mp3 type=audio/mpeg></audio>";
	    echo "</div>";

    ?>

    <div class="box" id="body">
		<form method="post" action="<?php $_PHP_SELF ?>">
		<table class="form">
			<tr>
				<td>
					Title:
				<td>
					<input name="song_title" type="text" placeholder="<?php echo $song_title ?>">
				</td>
			<tr>
				<td>
					Genre:
				<td>
					<select name="genre_id" class="dropdown">
						<?php

							// SQL
							$sql = "SELECT * FROM genre";
							$result = $conn->query($sql);

							// Result
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									if($row[genre_id] == $genre_id)
										echo "<option value=$row[genre_id] class=dropdown-content selected>$row[genre_name]</option>";
									else
										echo "<option value=$row[genre_id] class=dropdown-content>$row[genre_name]</option>";
								}
							}
							
						?>
					</select>
			<tr>
				<td>
				<td>
					<input name="edit" type="submit" value="edit" class="button">
		</table>
		</form>
		</div>

		<div class="box" id="body">
			<form action="/museeker/php/upload/song_img.php?song_id=<?php echo $song_id ?>" method="post" enctype="multipart/form-data">
			Select image to upload:
			<table class="form">
				<tr><td><input type="file" name="fileToUpload" id="fileToUpload">
				<tr><td><input type="submit" value="Upload Image" name="submit">
			</table>
			</form>
		</div>

		<div class="box" id="body">
			<form action="/museeker/php/upload/song_mp3.php?song_id=<?php echo $song_id ?>" method="post" enctype="multipart/form-data">
			Select mp3 file to upload:
			<table class="form">
				<tr><td><input type="file" name="songToUpload" id="songToUpload">
				<tr><td><input type="submit" value="Upload File" name="submit">
			</table>
			</form>
		</div>

    </div>

</div>

</body>
</html>