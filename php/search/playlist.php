<?php

    // SQL
    $sql = "
            SELECT *
            FROM playlist NATURAL JOIN account
            WHERE playlist_name LIKE '$search'
            AND public LIKE 1
            ";
    $result = $conn->query($sql);

    // Result
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'><table class='search'><h2>Public Playlists</h2><br>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>";
            echo "<a href=/museeker/playlist.php?playlist_id=$row[playlist_id]>";
            echo $row['playlist_name'];
            echo "<td>".$row['firstname']." ".$row['lastname'];
            echo "</td></tr></a>";
        }
        echo "</table></div>";
    }

?>