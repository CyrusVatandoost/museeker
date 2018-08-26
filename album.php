<html>
<head>
    <title>MuSeeker | Album Page</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";

    session_start();
    if($_SESSION['account_id'] != NULL)
        $account_id = $_SESSION['account_id'];
    else
        header("Location: /museeker/login.php");

    // SQL
    $sql = "SELECT * FROM account WHERE account_id LIKE $account_id ";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
    }

?>

<center>
<div class="parent">

    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/sidemenu.php"; ?>

    <div class="container">

        <div class="box" id="header">
            Album
        </div>

        <div class="box" id="body">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

    <?php

        $album_id = $_GET['album_id'];

        $sql = "SELECT *
                FROM ALBUM
                WHERE album_id LIKE $album_id";
        $result = $conn->query($sql);

        // Display SQL results
        if ($result->num_rows > 0) {
            echo "<div class=box>";
            echo "<table class=search>";
            if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/album/$album_id.jpg"))
                echo "<tr><td rowspan=6 align=center class=min><img src=/museeker/resources/img/album/$album_id.jpg class=square></tr>";
            else
                echo "<tr><td rowspan=6 align=center class=min><img src=/museeker/resources/img/album/default.jpg class=square></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>Album Title:  </td><td>$row[album_title]</td>";
                echo "<tr><td>Year:         </td><td>$row[year]</td>";
                echo "<tr><td>Description:    </td><td>$row[album_description]</td>";
                echo "</tr>";
            }
            echo "</table></div>";
        }

        include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/album_songs.php";

    ?>

    </div>

</div>

</body>
</html>