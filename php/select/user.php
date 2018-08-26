<?php

    echo "List of Users<br>";
    
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table class=table_search><tr><th>user_id</th><th>account_id</th><th>premium</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["user_id"]."</td><td>".$row["account_id"]."</td><td>".$row["premium"]."</td></tr>";
            }
            echo "</table><br>";
        }
        else
            echo "0 results<br>";

?>