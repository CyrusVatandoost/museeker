<?php

    // SQL
    $sql = "
            SELECT *
            FROM album
            WHERE album_title LIKE '$search'
            ";
    $result = $conn->query($sql);

    $table_name = "Albums";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/album.php";

?>