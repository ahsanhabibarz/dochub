<?php 
include("includes/body.php");
include("includes/header.php"); 
$sql2 = "SELECT * FROM apikeys WHERE id ='1'";
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute();
    $topic = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
    $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=".$topic[0]['value']."&maxResults=16&safeSearch=moderate&type=video&key=AIzaSyBDdmM2_otTdpt0zFW_7Y7x_ScpedIN7_g";
    $response = file_get_contents($url);
    $videos = json_decode($response);
?>

<div class="container" style="grid-template-columns: 1fr">
    <div class="postContainer globalpost globalvideos">
        <?php
            $col = ['#e53935' , "#3949ab" , 'rgb(100, 92, 255)' ,  '#43a047' , '#5D21D2' , '#999'] ;
            foreach ($videos->{'items'} as &$value) {
                echo "<a href='video.php?id=".$value->{'id'}->videoId."'>
                    <img src='".$value->{'snippet'}->thumbnails->medium->url."' alt=''>
                    <h4>".$value->{'snippet'}->title."</h4>
                    <span style='color: gray'>".$value->{'snippet'}->channelTitle."</span>
                </a>";
            }
        ?>
    </div>
</div>
              