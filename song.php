<!--

    Last Updated:   2017 08 12 17:06

-->
<!DOCTYPE html>
<html>
<head>
    <title>MuSeeker | Song</title>
    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/link.php"; ?>
</head>
<body>

<script type="text/javascript">
    
    // When the user clicks on the button, toggle between hiding and showing the dropdown content
    function myfunction() {
        document.getElementById("mydropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.b_dropbtn')) {
        var dropdowns = document.getElementsByClassName("b_dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

</script>

<?php

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/connect.php";

    session_start();
    if($_SESSION['account_id'] != NULL)
        $account_id = $_SESSION['account_id'];
    else
        header("Location: /museeker/login.php");

    // SQL
    $sql = "SELECT * FROM account WHERE account_id LIKE $account_id ";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
    }

?>

<center>
<div class="parent">

    <?php include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/sidemenu.php"; ?>

    <div class="container">

        <div class="box" id="header">
            <form method="post" action="/museeker/php/search.php">
                <input name="string" type="text">
                <input name="search" type="submit" value="search">
            </form>
        </div>

        <div class="box" id="title">
            Song
        </div>

<?php

    // Get vars from last page using session
    $song_id = $_GET['song_id'];

    $sql = "SELECT *
            FROM song NATURAL JOIN genre NATURAL JOIN artist
            WHERE song_id LIKE '$song_id' ";
    $result = $conn->query($sql);

    // Display SQL results
    if ($result->num_rows > 0) {
        echo "<div class=box id='body'>";
        echo "<table class=search>";
        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/img/song/$song_id.jpg"))
            echo "<tr><td rowspan=6 align=center class=min><img src=/museeker/resources/img/song/$song_id.jpg class=square></tr>";
        else
            echo "<tr><td rowspan=6 align=center class=min><img src=/museeker/resources/img/song/default.jpg class=square></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>Song:</td><td>$row[song_title]</td>";
            echo "<tr><td>Artist:</td><td>$row[artist_name]</td>";    
            echo "<tr><td>Genre:</td><td>$row[genre_name]</td>";
            echo "<tr><td>Plays:</td><td>$row[plays]</td>";
            echo "</tr>";
        }
        echo "</table></div>";
    }

    /*
    echo "<div class=box id='body'>";
        if(file_exists(realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/resources/mp3/$song_id.mp3"))
            echo "<audio controls><source src=/museeker/resources/mp3/$song_id.mp3 type=audio/mpeg></audio>";
        else
            echo "<audio controls><source src=/museeker/resources/mp3/default.mp3 type=audio/mpeg></audio>";
    echo "</div>";
    */

    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/add_song_playlist.php";
    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/play_song.php";
?>

    </div>

</div>

<?php    include realpath($_SERVER['DOCUMENT_ROOT'])."/museeker/php/html/song.php"; ?>

</body>
</html>