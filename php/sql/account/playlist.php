<?php

    // SQL
    $sql = "SELECT P.*, COUNT(song_id)
            FROM playlist P
            LEFT JOIN playlist_content PC
            ON P.playlist_id = PC.playlist_id
            WHERE account_id LIKE '$account_id'
            GROUP BY P.playlist_id
            ";
    $result = $conn->query($sql);

    $table_name = "Account Playlists";

    // Result
    if ($result->num_rows > 0) {
        echo "<div class=box><table class=search><h2>".$table_name."</h2>";
        echo "<th><th>NAME<th>NUM OF SONGS<th>PUBLIC<th>EDIT<th>DELETE";
        while($row = $result->fetch_assoc()) {
            $playlist_id = $row['playlist_id'];
            $playlist_name = $row['playlist_name'];
            $public = $row['public'];

            echo "<tr><td align=center class=min>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/playlist/$row[playlist_id].jpg"))
                echo "<img src=/museeker/resources/img/playlist/$playlist_id.jpg class=small>";
            else
                echo "<img src=/museeker/resources/img/playlist/default.jpg class=small></td>";

            echo "<td><a href=/museeker/playlist.php?playlist_id=$playlist_id>".$playlist_name;
            echo "<td>".$row['COUNT(song_id)'];

            if($public == 0)
                echo "<td>private";
            else
                echo "<td>public";

            echo "<td><a href='/museeker/edit/playlist.php?playlist_id=$playlist_id'>edit</a>";
            echo "<td><a href='/museeker/php/delete/playlist.php?playlist_id=$playlist_id'>delete</a>";
        }
        echo "</table></div>";
    }

?>