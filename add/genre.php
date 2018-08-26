<html>
<head>
	<title>Add Genre</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="/museeker/resources/img/museeker.ico" />
</head>
<body>

<?php

	// Connect to DB
	if(isset($_POST['add'])) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "museeker";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		// Get values
		$genre_name = $_POST['genre_name'];

		// SQL
		$sql = "INSERT INTO genre (genre_name)
				VALUES ('$genre_name')";
		
		// Check SQL
		if ($conn->query($sql) === TRUE) {
			echo "Successfully added a genre.<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		echo "List of Genres<br><br>";
	
		$sql = "SELECT * FROM genre";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "<table border=1><tr><th>genre_id</th><th>genre_name</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["genre_id"]."</td><td>".$row["genre_name"]."</td></tr>";
			}
			echo "</table>";
		}
		else
			echo "0 results<br>";

		$conn->close();
	}
	
?>

<center>

Upload Song

<br><br>
<form method="post" action="<?php $_PHP_SELF ?>">
	<table width="" border="0" cellspacing="1" cellpadding="2">
		<tr align="right">
			<td width="">genre name</td>
			<td>
				<input name="genre_name" type="text">
			</td>
		</tr>
		<tr>
			<td width=""></td>
			<td>
				<input name="add" type="submit" id="add" value="add genre">
			</td>
		</tr>
	</table>
</form>

<br>
<a href="/museeker/index.html">Log out</a> | 
<a href="/museeker/log_in.php">Login</a> | 
<a href="/museeker/add/account.php">Sign-up</a>

</body>
</html>