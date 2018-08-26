<!--

    Last Updated:   2017 08 08 00:52

-->
<html>
<head>
	<title>MuSeeker | Account</title>
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
            Account
        </div>

<?php

	$account_id = $_GET['account_id'];

	$sql = "
			SELECT *
			FROM artist
			WHERE account_id LIKE '$account_id'
			";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	// SQL
	$sql = "
			SELECT *
			FROM account
			LEFT JOIN artist
			ON account.account_id = artist.account_id
			WHERE account.account_id LIKE '$account_id' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$type = $row['type'];
			echo "<div class=box>";
			echo "<table class='search'>";
	        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/account/$account_id.jpg"))
	            echo "<tr><td rowspan=5 align=center class=min><img src=/museeker/resources/img/account/$account_id.jpg class=square>";
	        else
	            echo "<tr><td rowspan=5 align=center class=min><img src=/museeker/resources/img/account/default.jpg class=square>";
	        if($type == "artist")
		       	echo "<td align=center><h3>".$row['artist_name'];
		    else
		       	echo "<td align=center><h3>".$row['firstname']." ".$row['last_name'];
		}
		echo "</table></div>";
	}
	else
		echo "Account does not exist.<br>";

    if($type == "artist") {
		include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist_songs.php";
		include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist_albums.php";
    }

?>

    </div>

</body>
</html>