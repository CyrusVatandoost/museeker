<html>
<head>
	<title>List of Genres</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<div class="header">
<h1>List of Genres</h1>
</div>

<?php
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/genre.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/footer.php";
?>

</body>
</html>