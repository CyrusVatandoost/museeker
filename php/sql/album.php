<?php

    // Result
    if ($result->num_rows > 0) {
        echo "<div class=box class='body'>";
        echo "<h2>".$table_name."</h2><table class='search'>";
        echo "<th><th>TITLE";
        while($row = $result->fetch_assoc()) {

            echo "<tr><td align=center class=min>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/album/$row[album_id].jpg"))
                echo "<img src=/museeker/resources/img/album/$row[album_id].jpg class=small></td>";
            else
                echo "<img src=/museeker/resources/img/album/default.jpg class=small></td>";

            echo "<td><a href=/museeker/album.php?album_id=$row[album_id]>".$row['album_title']."</td>";
            echo "</a>";
        }
        echo "</table></div>";
    }

?>