<?php

    // SQL
    $sql = "SELECT *
            FROM song NATURAL JOIN artist NATURAL JOIN account NATURAL JOIN genre
            WHERE account_id LIKE $account_id
            ";
    $result = $conn->query($sql);

    $table_name = "Songs";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>