<!--

    Last Updated:   2017 08 12 13:12

-->
<html>
<head>
	<title>MuSeeker | Create Playlist</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>
<center>

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
        </table>
        <hr>
        <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link_table.php"; ?>
        <hr>
        <table class="sidemenu">
            <tr>
                <td>Playlists
            <tr>
                <td><a href="/museeker/add/playlist.php">Create Playlist</a>
        </table>
    </div>

    <div class="container">

        <div class="box" id="header">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

        <div class="box" id="title">
            Create Playlist
        </div>

	<?php
	    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/add/playlist.php";
	?>

    </div>

</div>

</body>
</html>