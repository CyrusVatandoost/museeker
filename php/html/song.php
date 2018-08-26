<?php

	/*
	if($_SESSION['current_song_id'] == NULL) {
		$current_song_id = "default";
		echo "DEFAULT";
	}
	else {
		$current_song_id = $_SESSION['current_song_id'];
	}
	*/

	$current_song_id = $_SESSION['current_song_id'];
	//echo $current_song_id;

?>

<div>
	<button type="button" onclick="changeSong()">Play Song</button>
</div>

<div class="player">
    <audio id="player" src=/museeker/resources/mp3/<?php echo $current_song_id ?>.mp3 controls autobuffer></audio>
</div>

<script>

    var song = document.getElementById('player');
    var played = false;
    var tillPlayed = getCookie('timePlayed');

	function changeSong() {
		document.getElementById('player').src="/museeker/resources/mp3/<?php echo $song_id ?>.mp3";
		document.getElementById('player').play();
		document.getElementById('player').currentTime = 0;
		<?php
			echo $_SESSION['current_song_id'] = $song_id;
			echo $song_id;
		?>
	}

    function setCookie(c_name,value, exdays) {
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
        document.cookie=c_name + "=" + c_value;
    }

    function getCookie(c_name) {
        var i,x,y,ARRcookies=document.cookie.split(";");
        for (i=0;i<ARRcookies.length;i++) {
			x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
			y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
			x=x.replace(/^\s+|\s+$/g,"");
          
        	if (x==c_name) {
            	return unescape(y);
        	}
        }
    }
    
    function update() {
        if(!played) {
            if(tillPlayed) {
                song.currentTime = tillPlayed;
                song.play();
                played = true;
            }
            else {
                song.play();
                played = true;
            }
        }
        else {
        	setCookie('timePlayed', song.currentTime);
        }
    }

    setInterval(update, 1000);

</script>