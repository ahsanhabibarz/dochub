<?php include("includes/body.php");
    include("includes/config/connect.php");
    if(isset($_SESSION['admin'])){
        header("Location: admin.php");
    }
?>

    <div class="loginContainer">
    <div class="login">
    <div>
        <img src="./assets/images/login.svg" alt="">
        </div>
        <form class="loginForm" action="./includes/handlers/admin-login-handler.php" method="POST">
        <h2>Admin Login</h2>
        <input type="email" name="ademail" id="" placeholder="Email" required>
        <input type="password" name="adpass" id="" placeholder="Password" required>
        <div>
        <button type="submit">Signin</button>
        </div>
        </form>
    </div>
    </div>
<?php include("includes/footer.php") ?>
    