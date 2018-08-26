<html>
<head>
	<title>Edit Album</title>
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

    // SQL
	$sql = "
			SELECT *
			FROM album
			WHERE album_id LIKE '$album_id'
			";
	$result = $conn->query($sql);
	
	// Result
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$album_id = $row['album_id'];
			$album_title = $row['album_title'];
			$album_description = $row['album_description'];
		}
	}
	else
		echo "Invalid email or password.<br>";

	if(isset($_POST['update'])) {
			if($_POST['album_title'] != null)
				$album_title = $_POST['album_title'];

			if($_POST['album_description'] != null)
				$album_description = $_POST['album_description'];

			$sql = "UPDATE album SET album_title = '$album_title', album_description = '$album_description' WHERE album_id = '$album_id'";
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
            Edit Album
        </div>

        <div class="box">
			<form method="post" action="<?php $_PHP_SELF ?>">
			<table class="form">
				<tr>
					<td>
						Album Title:
					</td>
					<td>
						<input name="album_title" type="text" placeholder="<?php echo $album_title ?>">
					</td>
				</tr>
				<tr>
					<td>
						Album Description:
					</td>
					<td>
						<textarea name="album_description" rows="5" placeholder="<?php echo $album_description?>"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input name="update" type="submit" value="update" class="button">
					</td>
				</tr>
			</table>
			</form>
		</div>

		<div class="box" id="body">
			<form action="/museeker/php/upload/album_img.php?album_id=<?php echo $album_id ?>" method="post" enctype="multipart/form-data">
			    Select image to upload:
			    <table class="form">
			    <tr><td><input type="file" name="fileToUpload" id="fileToUpload">
			    <tr><td><input class="button" type="submit" value="Upload Image" name="submit">
			</form>
		</div>


    <?php

    ?>

    </div>

</div>

</body>
</html>