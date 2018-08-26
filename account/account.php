<!--

    Last Updated:   2017 08 12 15:08

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

        <div class="box" id="body">
        	<a href="/museeker/edit/account.php">Edit Profile</a>
        </div>

<?php

	// SQL
	$sql = "SELECT * FROM account WHERE account_id LIKE '$account_id' ";
	$result = $conn->query($sql);

	// Result
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($row['type'] == "artist")
				$type = $row["type"];
			$_SESSION['account_id'] = $row["account_id"];
			$account_id = $row["account_id"];
			$_SESSION['account_id'] = $account_id;

	        echo "<div class=box>";
	        echo "<table class=search>";
	        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/account/$account_id.jpg"))
	            echo "<tr><td rowspan=5 align=center class=min><img src=/museeker/resources/img/account/$account_id.jpg class=square></tr>";
	        else
	            echo "<tr><td rowspan=5 align=center class=min><img src=/museeker/resources/img/account/default.jpg class=square></tr>";
			echo "<td>Name:";
			echo "<td>".$row['firstname']." ".$row['lastname'];
			echo "<tr><td>Email:</td><td>".$row['email'];
			echo "<tr><td>Account Type:</td><td>".$row['type'];
			echo "<tr><td>Date Registered:</td><td>".$row['date_registered'];
			echo "</table></div>";
		}
	}
	else
		echo "Invalid email or password.<br>";

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/artist.php";	
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/recent5songs.php";	
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/account/playlist.php";
	
?>

</div>

</body>
</html>