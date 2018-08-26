<html>
<head>
	<title>Remove Album Songs</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<center>
<div class="header">
	<h1>Remove Album Songs</h1>
</div>

<?php

	// Get vars from last page using session
	session_start();
	$account_id = $_SESSION['account_id'];
	$album_id = $_GET['album_id'];

	
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";	
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php";

?>

<div class="parent">
<?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/sidemenu.php"; ?>

	<div class="container">
		<?php

			// SQL
			$sql = "
					SELECT *
					FROM album_content NATURAL JOIN song NATURAL JOIN artist
					WHERE album_id LIKE '$album_id'
					";
			$result = $conn->query($sql);


			// Result
			if ($result->num_rows > 0) {
				echo "<div class=box>";
				echo "<table width=100% class=search>";
				echo "<th><th><center>TITLE<th><center>ARTIST<th><center>REMOVE FROM ALBUM";
				while($row = $result->fetch_assoc()) {
		            echo "<tr><td align=center class=min>";
		            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/song/$row[song_id].jpg"))
		                echo "<img src=/museeker/resources/img/song/$row[song_id].jpg class=small></td>";
		            else
		                echo "<img src=/museeker/resources/img/song/default.jpg class=small></td>";
					echo "<td><center>".$row['song_title'];
					echo "<td><center>".$row['artist_name'];
					echo "<td><center><a href=/museeker/php/delete/album_song.php?album_id=$row[album_id]&song_id=$row[song_id]>remove</a>";
				}
				echo "</table></div>";
			}


		?>
	</div>

</div>

</body>
</html>