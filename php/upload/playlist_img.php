<?php
	$playlist_id = $_GET['playlist_id'];

	$target_dir = realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/playlist/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}

    // Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/playlist/$playlist_id.jpg")) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
			// Go to another page
			header("Location: /museeker/edit/playlist.php?playlist_id=$playlist_id");
			exit;	

	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
?>