<html>
<head>
	<title>MuSeeker  | Edit Playlist</title>
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

   	$playlist_id = $_GET['playlist_id'];

    // SQL
	$sql = "
			SELECT *
			FROM playlist
			WHERE playlist_id LIKE '$playlist_id'
			";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$playlist_id = $row['playlist_id'];
			$playlist_name = $row['playlist_name'];
			$playlist_description = $row['playlist_description'];
			$public = $row['public'];
		}
	}
	else
		echo "Invalid email or password.<br>";

	if(isset($_POST['update'])) {
			if($_POST['playlist_name'] != null)
				$playlist_name = $_POST['playlist_name'];
			if($_POST['playlist_description'] != null)
				$playlist_description = $_POST['playlist_description'];

			$public = $_POST['public'];

			$sql = "UPDATE playlist
					SET playlist_name = '$playlist_name',
						playlist_description = '$playlist_description'
					WHERE playlist_id = '$playlist_id'";
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
            Edit Playlist
        </div>

        <div class="box">
			<form method="post" action="<?php $_PHP_SELF ?>">
			<table class="form">
				<tr>
					<td>Playlist Name:
					<td><input name="playlist_name" type="text" placeholder="<?php echo $playlist_name ?>">
				<tr>
					<td>Playlist Description:
					<td><textarea name="playlist_description" rows="5" placeholder="<?php echo $playlist_description?>"></textarea>
				<tr>
					<td><td>
					<?php
						if($public == 0) {
							echo "<input type='radio' name='public' value='1'>public";
							echo "<input type='radio' name='public' value='0' checked>private";
						}
						else {
							echo "<input type='radio' name='public' value='1' checked>public";
							echo "<input type='radio' name='public' value='0'>private";
						}
					?>
				<tr>
					<td><td><input name="update" type="submit" value="update" class="button">
			</table>
			</form>
		</div>

		<div class="box" id="body">
			<form action="/museeker/php/upload/playlist_img.php?playlist_id=<?php echo $playlist_id ?>" method="post" enctype="multipart/form-data">
				Select image to upload:
			    <table class="form">
			    <tr><td><input type="file" name="fileToUpload" id="fileToUpload">
			    <tr><td><input class="button" type="submit" value="Upload Image" name="submit">
			    </table>
			</form>
		</div>

	    <?php

    	    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/playlist.php";
	    	include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/playlist/song.php";

	    ?>

    </div>

</div>

</body>
</html>