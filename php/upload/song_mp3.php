<?php
	$song_id = $_GET['song_id'];

	$target_dir = realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/mp3/";
	$target_file = $target_dir . basename($_FILES["songToUpload"]["name"]);
	$uploadOk = 1;
	$type = pathinfo($target_file,PATHINFO_EXTENSION);

	echo "type: ".$type."<br>";

	// Allow certain file formats
	if($type != "mp3") {
	    echo "Sorry, only MP3 files are allowed.<br>";
	    $uploadOk = 0;
	}

    // Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.<br>";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["songToUpload"]["tmp_name"], realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/mp3/$song_id.mp3")) {
	    	
	        echo "The file ". basename( $_FILES["songToUpload"]["name"]). " has been uploaded.<br>";
			
			// Go to another page
			header("Location: /museeker/edit/song.php?song_id=$song_id");
			exit;	

	    } else {
	        echo "Sorry, there was an error uploading your file.<br>";
	    }
	}
?>