<?php

    // SQL
    $sql = "SELECT *, max(datetime)
            FROM history h
            NATURAL JOIN song s
            JOIN artist a
            ON a.artist_id = s.artist_id
            JOIN genre g
            ON s.genre_id = g.genre_id
            WHERE h.account_id LIKE '$account_id'
            GROUP BY h.song_id
            HAVING COUNT(h.song_id) > 1
            ORDER BY max(datetime) DESC
            LIMIT 5";
    $result = $conn->query($sql);

    $table_name = "Recently Played Songs!";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/song.php";

?>