<?php

    // Display SQL results
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'>";
        echo "<h2>".$table_name."</h2><br><table class=search>";
        echo "<th><th>TITLE<th>ARTIST<th>GENRE<th class=right>PLAYS";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td align=center class=min>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/song/$row[song_id].jpg"))
                echo "<img src=/museeker/resources/img/song/$row[song_id].jpg class=small></td>";
            else
                echo "<img src=/museeker/resources/img/song/default.jpg class=small></td>";

            echo "<td width=30%><a href=/museeker/song.php?song_id=$row[song_id]>".$row['song_title']."</td>";
            echo "<td width=30%><a href=/museeker/account/public.php?account_id=$row[account_id]>";
            if($row['artist_name'] == null)
                echo $row['firstname']." ".$row['lastname'];
            else
                echo $row['artist_name'];
            echo "</a>";
            echo "<td><a href=/museeker/genre.php?genre_id=$row[genre_id]>".$row['genre_name']."</a>";
            echo "<td align=right>".$row['plays'];

        }

        echo "</table></div>";
        
    }

?>