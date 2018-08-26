<div class="box" id="title">
	<?php echo $artist_name ?>
</div>

<div class="box" id="body">
	<a href="/museeker/add/song.php">Upload Song</a> | 
	<a href="/museeker/add/album.php">Upload Album</a>
</div>

<?php
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist/song.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/sql/artist/album.php";
?>