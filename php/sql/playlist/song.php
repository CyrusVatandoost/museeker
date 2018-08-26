<?php

    // SQL
    $sql = "SELECT *
            FROM playlist_content NATURAL JOIN song NATURAL JOIN genre NATURAL JOIN artist
            WHERE playlist_id LIKE '$playlist_id'
            ";
    $result = $conn->query($sql);

    $table_name = "Playlist Songs";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>