<?php 
require("includes/config/connect.php");
if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
}
?>
<header>
    <nav>
        <div class="logo">
            <a href="admin.php">
            <span style="color: #5D21D2">Admin</span>
            </a>
        </div>
        <div class="adminNavLinks">
            <ul>
                <li><a href="admin-posts.php"><i class="fas fa-plus-circle"></i>Posts</a></li>
                <li><a href="admin-doctors.php"><i class="fas fa-user-md"></i>Doctors</a></li>
            </ul>
        </div>
    </nav>
</header>