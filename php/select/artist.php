<?php

    echo "List of Artists<br>";
    
    $sql = "SELECT * FROM artist";
    $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table class=table_search><tr><th>artist_id</th><th>account_id</th><th>artist_name</th><th>verified</th><th>ranking</th><th>listens</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["artist_id"]."</td>";
                echo "<td>".$row["account_id"]."</td>";
                echo "<td>".$row["artist_name"]."</td>";
                echo "<td>".$row["verified"]."</td><td>".$row["ranking"]."</td><td>".$row["listens"]."</td></tr>";
            }
            echo "</table><br>";
        }
        else
            echo "0 results<br>";

?>