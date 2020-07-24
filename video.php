<?php 
include("includes/body.php");
include("includes/header.php");
if(isset($_GET['id'])){
    $vidid = $_GET['id'];
}
?>
<div class="container" style="grid-template-columns: 1fr; height: 90vh">
    <?php
        echo "<iframe class='youtubeFrame' width='100%' height='100%' src='https://www.youtube.com/embed/".$vidid."?showinfo=0' frameborder='0' allowfullscreen></iframe>";
    ?>
</div>