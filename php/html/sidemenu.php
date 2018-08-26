<!--

    Last Updated:   2017 08 13 13:27

-->
<div class="sidemenu">

    <table class="sidemenu">
        <tr>
            <td>
            <center>
            <?php
                echo "<img src='/museeker/resources/img/account/";
                if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/account/$account_id.jpg"))
                    echo $account_id;
                else
                    echo "default";
                echo ".jpg' width='100px' height='100px'>";

            ?>
        <tr>
            <td><center>
            <?php
                $sql = "SELECT * FROM account WHERE account_id LIKE '$account_id' ";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row['firstname']." ".$row['lastname'];
                }
            ?>
    </table>

    <hr>

    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link_table.php"; ?>

    <hr>
    <table class="sidemenu">
        <tr>
            <td>Playlists
        <tr>

        <?php

            // SQL
            $sql = "SELECT * FROM playlist WHERE account_id LIKE '$account_id'";
            $result = $conn->query($sql);

            $table_name = "Account Playlists";

            // Result
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>";
                    echo "<a href=/museeker/playlist.php?playlist_id=$row[playlist_id]>";
                    echo $row['playlist_name'];
                    echo "</a>";
                }
            }

        ?>
    </table>
    <hr>
    <table class="sidemenu">
        <tr><td><a href="/museeker/add/playlist.php">New Playlist</a>
    </table>
</div>