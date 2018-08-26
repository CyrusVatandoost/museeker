<?php

    echo "List of Accounts<br>";
    
    $sql = "SELECT * FROM account";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table class=table_search><tr><th>account_id</th><th>email</th><th>first name</th><th>last name</th><th>password</th><th>type</th><th>date registered</th><th>last login</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["account_id"]."</td><td>".$row["email"]."</td>";
            echo "<td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["password"]."</td>";
            echo "<td>".$row["type"]."</td><td>".$row["date_registered"]."</td><td>".$row["last_login"]."</td></tr>";
        }
        echo "</table><br>";
    }
    else
        echo "0 results<br>";

?>