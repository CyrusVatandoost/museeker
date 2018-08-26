<?php

    // SQL
    $sql = "SELECT * FROM artist NATURAL JOIN account ORDER BY ranking DESC LIMIT 5;";
    $result = $conn->query($sql);

    // Display SQL results
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'>";
        echo "<h2>Top Artists!</h2><table class=search>";
        echo "<th><th>RANK</th></th><th>NAME</th>";
        while($row = $result->fetch_assoc()) {

            echo "<tr>";

            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/account/$row[account_id].jpg"))
                echo "<td class=min><img src=/museeker/resources/img/account/$row[account_id].jpg class=small>";
            else
                echo "<td class=min><img src=/museeker/resources/img/account/default.jpg class=small>";

            echo "<td width=1%>".$row['ranking'];
            echo "<td><a href=/museeker/account/public.php?account_id=$row[account_id]>";
            if($row['artist_name'] == null)
                echo $row['firstname']." ".$row['lastname'];
            else
                echo $row['artist_name'];
            echo "</a>";
        }
        echo "</table></div>";
    }

?>