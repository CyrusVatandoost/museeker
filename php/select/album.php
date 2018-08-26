<?php

    echo "List of Albums<br>";
    
        $sql = "SELECT * FROM album";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table class=table_search><tr><th>album_id</th><th>album_title</th><th>year</th><th>album_description</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["album_id"]."</td><td>".$row["album_title"]."</td><td>".$row["year"]."</td><td>".$row["album_description"]."</td></tr>";
            }
            echo "</table><br>";
        }
        else
            echo "0 results<br>";

?>