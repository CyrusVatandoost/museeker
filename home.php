<!--

    Last Updated:   2017 08 12 17:06

-->
<html>
<head>
    <title>MuSeeker | Home</title>
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
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

        <div class="box" id="title">
            Home
        </div>

    <?php
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/top5songs_square.php";
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/top5songsweekly.php";
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/top5newsongs.php";
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/top5songs.php";
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/recent5songs.php";
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/top5artists.php";
            include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/top5newartists.php";
    ?>

    </div>

</div>

</body>
</html>