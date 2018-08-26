<?php

    // SQL
    $sql = "SELECT *
            FROM album_content NATURAL JOIN song NATURAL JOIN genre NATURAL JOIN artist
            WHERE album_id LIKE '$album_id'
            ";
    $result = $conn->query($sql);

    $table_name = "Album Songs";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>