<?php

	$sql = "SELECT * FROM artist WHERE account_id LIKE $account_id";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$artist_id = $row['artist_id'];
		$artist_name = $row['artist_name'];
  		include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/artist_content.php";
	}

?>

