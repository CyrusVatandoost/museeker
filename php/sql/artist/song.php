<?php

    $sql = "SELECT s.*, a.album_id, a.album_title, genre.*
            FROM song s
            NATURAL JOIN genre
            LEFT JOIN album_content ac ON s.song_id = ac.song_id
            LEFT JOIN album a ON ac.album_id = a.album_id
            WHERE s.artist_id LIKE '$artist_id' ";
    $result = $conn->query($sql);

    // Result
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'><h2>Songs</h2><table class='search'>";
        echo "<th></th><th>TITLE</th><th>ALBUM</th><th>GENRE</th><th>PLAYS</th><th>EDIT</th><th class=right>DELETE</th>";
        while($row = $result->fetch_assoc()) {

            echo "<tr><td align=center class=min>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/song/$row[song_id].jpg"))
                echo "<img src=/museeker/resources/img/song/$row[song_id].jpg class=small></td>";
            else
                echo "<img src=/museeker/resources/img/song/default.jpg class=small></td>";

            echo "<td width=25%><a href=/museeker/song.php?song_id=$row[song_id]>".$row['song_title']."</td>";

            if($row['album_id'] != NULL)
                echo "<td><a href=/museeker/album.php?album_id=$row[album_id]>".$row['album_title']."</a>";
            else
                echo "<td>Add to album";

            echo "<td><a href=/museeker/genre.php?genre_id=$row[genre_id]>".$row['genre_name']."</a></td>";
            echo "<td>".$row['plays'];
            echo "<td><a href=/museeker/edit/song.php?song_id=".$row['song_id'].">edit";
            echo "<td align=right><a href=/museeker/php/delete/song.php?song_id=$row[song_id]>delete";
        }
        echo "</table></div>";
    }

?>