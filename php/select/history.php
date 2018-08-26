<?php

    // History
    echo "History<br>";
    
        $sql = "SELECT * FROM history";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table class=table_search><tr><th>account_id</th><th>song_id</th><th>datetime</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["account_id"]."</td><td>".$row["song_id"]."</td><td>".$row["datetime"]."</td></tr>";
            }
            echo "</table><br>";
        }
        else
            echo "0 results<br>";

?>