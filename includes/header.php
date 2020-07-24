<?php 
require("includes/config/connect.php");
?>
<header>
    <nav>
        <div class="logo">
            <a href="index.php">
            <span style="color: #000">Doc</span><span style="color: #5D21D2">Hub</span>
            </a>
        </div>
        <div class="searchBarContainer">
            <i class="material-icons" style="font-size: 24px; margin-top: 2px">search</i>
            <input type="text" id="searchInput" placeholder="Search Topic">
        </div>
        <div class="auth">
        <i class="material-icons" style="font-size: 24px; margin-top: 2px">add</i> <a href="createpost.php">New Post</a>
        </div>
        <?php
        if(isset($_SESSION['user'])){
            $profile = "<a href='./logout.php' class='profileImg'><span>".substr($_SESSION['user'][1], 0, 1)."</span></a>";
            echo $profile;
        }
        ?>
    </nav>
</header>