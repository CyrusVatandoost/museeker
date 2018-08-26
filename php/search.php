<?php
    
    // When submit is clicked
    if(isset($_POST['search'])) {

        // Get values from search
        $string = "%".$_POST['string']."%"; // Add -% to the search.

        // Go to another page
        header("Location: /museeker/result.php?search=$string");

    }

?>