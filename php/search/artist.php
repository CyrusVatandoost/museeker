<?php

    // SQL
    $sql = "
            SELECT *
            FROM artist NATURAL JOIN account
            WHERE artist_name LIKE '$search'
            ";
    $result = $conn->query($sql);

    $table_name = "Artists";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist.php";

?>