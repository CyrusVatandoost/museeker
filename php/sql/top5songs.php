<?php

    // SQL
    $sql = "SELECT * FROM song
            NATURAL JOIN artist NATURAL JOIN account
            LEFT JOIN genre ON song.genre_id = genre.genre_id
            ORDER BY plays DESC LIMIT 5;";
    $result = $conn->query($sql);

    $table_name = "Top Songs!";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>