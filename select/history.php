<html>
<head>
	<title>History</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>	
</head>
<body>

<div class="header">
<h1>History</h1>
</div>

<?php
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/select/history.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/footer.php";
?>

</body>
</html>