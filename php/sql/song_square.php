<?php

    // Display SQL results
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'>";
        echo "<h2>".$table_name."</h2><br><table class=square>";
        $count = 0;
        while($row = $result->fetch_assoc()) {
            $song_id = $row['song_id'];
            $song_title = $row['song_title'];
            $account_id = $row['account_id'];
            $artist_name = $row['artist_name'];
            $genre_name = $row['genre_name'];
            $plays = $row['plays'];

            if($count++ > 3) {
                echo "<tr>";
                $count = 0;
            }

            echo "<td><a href=/museeker/song.php?song_id=$song_id>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/song/$song_id.jpg"))
                echo "<img class='home' src='/museeker/resources/img/song/$song_id.jpg'>";
            else
                echo "<img class='home' src='/museeker/resources/img/song/default.jpg'>";

            echo "<br>";
            echo $artist_name." - ".$song_title;
            echo "</a>";

        }

        echo "</table></div>";
        
    }

?>