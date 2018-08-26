<?php

    // SQL
    $sql = "
            SELECT *
            FROM song NATURAL JOIN artist NATURAL JOIN account NATURAL JOIN genre
            WHERE song_title LIKE '$search'
            ORDER BY song_title
            ";
    $result = $conn->query($sql);

    $table_name = "Songs";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>