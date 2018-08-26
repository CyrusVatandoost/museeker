<html>
<head>
	<title>List of All</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<div class="header">
<h1>List of All</h1>
</div>

<?php
    session_start();
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/links.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/account.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/user.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/artist.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/song.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/album.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/genre.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/history.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/footer.php";
?>

</body>
</html>