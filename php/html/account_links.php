<?php

	$type = $_SESSION['type'];

	echo "<div class=main>";
	echo "<a href=/museeker/home.php>Home</a> | ";

	if($type == "artist")
		echo "<a href=/museeker/account/artist.php>Artist Page</a> | ";
	else if($type == "admin")
		echo "<a href=/museeker/account/admin.php>Admin Page</a> | ";

	echo "<a href=/museeker/edit/account.php>Edit Profile</a> | ";
	echo "<a href=/museeker/add/playlist.php>Create Playlist</a> | ";
	echo "<a href=/museeker/search.php>Search</a>";
	echo "</div>";

?>