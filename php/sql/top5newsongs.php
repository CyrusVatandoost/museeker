<?php

    // SQL
    $sql = "SELECT *
			FROM song
			NATURAL JOIN artist NATURAL JOIN account
			LEFT JOIN genre
			ON song.genre_id = genre.genre_id
			ORDER BY song.upload_date DESC
			LIMIT 5;";
    $result = $conn->query($sql);

    $table_name = "New Songs!";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>