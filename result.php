<!--

    Last Updated:   2017 08 08 01:16

-->
<html>
<head>
    <title>MuSeeker | Results</title>
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
            Search
        </div>

        <div class="box" id="body">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

<?php
        $search = $_GET['search'];
        
        // When submit is clicked
        if(isset($_POST['search'])) {

            // Get values from search
            $string = "%".$_POST['string']."%"; // Add -% to the search.

            // Go to another page
            header("Location: /museeker/result.php?search=$string");

        }

        include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/search/song.php";
        include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/search/artist.php";
        include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/search/album.php";
        include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/search/playlist.php";
?>

    </div>

</div>

</body>
</html>