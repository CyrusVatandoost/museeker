<?php

    echo "List of Songs<br>";
    
    $sql = "SELECT * FROM song";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table class=table_search><tr><th>song_id</th><th>song_title</th><th>artist_id</th><th>duration</th><th>genre<th>plays</th><th>upload_date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["song_id"]."</td><td>".$row["song_title"]."</td><td>".$row["artist_id"]."</td><td>".$row["duration"]."</td><td>".$row["genre_id"]."</td>";
            echo "<td>".$row["plays"]."</td><td>".$row["upload_date"]."</td></tr>";
        }
        echo "</table><br>";
    }
    else
        echo "0 results<br>";

?>