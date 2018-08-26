<?php
	
	$sql = "SELECT * FROM artist WHERE account_id LIKE $account_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$artist_id = $row['artist_id'];
	}

    $sql = "SELECT *
            FROM album
            WHERE artist_id LIKE $artist_id
            ";
    $result = $conn->query($sql);

    $table_name = "Albums";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/album.php";

?>