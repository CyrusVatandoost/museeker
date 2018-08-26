<html>
<head>
	<title>List of Songs</title>
	<link rel="stylesheet" type="text/css" href="/museeker/styles.css">
	<link rel="shortcut icon" href="/museeker/resources/img/museeker.ico"/>
</head>
<body>

<div class="header">
<h1>List of Songs</h1>
</div>

<?php
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/song.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/footer.php";
?>

</body>
</html>