<table class="sidemenu">

<?php

	if($_SERVER['REQUEST_URI'] != "/museeker/home.php")
		echo "<tr><td><a href=/museeker/home.php>Home</a>";

	if($_SERVER['REQUEST_URI'] != "/museeker/account/account.php")
		echo "<tr><td><a href=/museeker/account/account.php>Profile</a>";

	echo "<tr><td><a href=/museeker/login.php>Log out</a>";

?>

</table>