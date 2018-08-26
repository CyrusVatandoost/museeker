<?php

    // SQL
    $sql = "SELECT *
            FROM song NATURAL JOIN account NATURAL JOIN artist NATURAL JOIN genre
            WHERE genre_id LIKE '$genre_id'
            ";
    $result = $conn->query($sql);

    $table_name = "Genre Songs";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>