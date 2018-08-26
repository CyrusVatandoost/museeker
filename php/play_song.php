<?php
    // SQL
    $sql = "UPDATE song SET plays = plays + 1 WHERE song_id = '$song_id' ";
    $result = $conn->query($sql);

    // SQL
    $sql = "INSERT INTO history (account_id, song_id, datetime)
            VALUES ('$account_id', '$song_id', CURRENT_TIMESTAMP)";
    $result = $conn->query($sql);

?>