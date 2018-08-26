<?php

    echo "List of Genres<br>";
    
        $sql = "SELECT * FROM genre";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table class=table_search><tr><th>genre_id</th><th>genre_name</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["genre_id"]."</td><td>".$row["genre_name"]."</td></tr>";
            }
            echo "</table><br>";
        }
        else
            echo "0 results<br>";

?>