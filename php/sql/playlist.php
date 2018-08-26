<?php

    $playlist_id = $_GET['playlist_id'];

    $sql = "SELECT *
            FROM playlist
            WHERE playlist_id LIKE '$playlist_id' ";
    $result = $conn->query($sql);

    // Display SQL results
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class=box>";
        echo "<table class=search>";

        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/playlist/$playlist_id.jpg"))
            echo "<tr><td rowspan=5 align=center class=min><img src=/museeker/resources/img/playlist/$playlist_id.jpg class=square></tr>";
        else
            echo "<tr><td rowspan=5 align=center class=min><img src=/museeker/resources/img/playlist/default.jpg class=square></tr>";

        echo "<tr><td>Name:         </td><td>$row[playlist_name]</td>";
        echo "<tr><td>Descption:    </td><td>$row[playlist_description]</td>";
        echo "</tr>";
        echo "</table></div>";
    }

?>