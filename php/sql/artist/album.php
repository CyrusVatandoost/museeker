<?php

    // SQL
    $sql = "SELECT *
            FROM album
            WHERE artist_id LIKE '$artist_id'
            ";
    $result = $conn->query($sql);

    // Result
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'><table class='search'><h2>Albums</h2>";
        echo "<th><th>TITLE<th>GENRE<th>EDIT<th>ADD SONGS<th>REMOVE SONGS<th>DELETE";
        while($row = $result->fetch_assoc()) {

            echo "<tr><td align=center class=min>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/album/$row[album_id].jpg"))
                echo "<img src=/museeker/resources/img/album/$row[album_id].jpg class=small></td>";
            else
                echo "<img src=/museeker/resources/img/album/default.jpg class=small></td>";

            echo "<td><a href=/museeker/album.php?album_id=$row[album_id]>".$row['album_title']."</td>";
            echo "<td>genre</td>";
            echo "<td><a href=/museeker/edit/album.php?album_id=$row[album_id]>edit</td>";
            echo "<td><a href=/museeker/edit/album_add_song.php?album_id=$row[album_id]>add</td>";
            echo "<td><a href=/museeker/edit/album_remove_song.php?album_id=$row[album_id]>remove</td>";
            echo "<td><a href=/museeker/php/delete/album.php?album_id=$row[album_id]>delete</td>";
            echo "</a>";
        }
        echo "</table></div>";
    }

?>