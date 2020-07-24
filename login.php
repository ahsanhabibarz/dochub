<?php include("includes/body.php");
    include("includes/config/connect.php");
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
?>

    <div class="loginContainer">
        <div class="login">
            <div class="imgdiv">
                <img src="./assets/images/login.svg" alt="">
            </div>
            <form name="loginForm" class="loginForm" id="loginForm" action="./includes/handlers/login-handler.php" method="POST">
                <h2>Signin</h2>
                <input type="email" name="lemail" id="lemail" placeholder="Email" required>
                <input type="password" name="lpass" id="lpass" placeholder="Password" required>
                <div id="submitbt">
                    <button type="submit">Signin</button>
                </div>
                <span class="errorspan">
                <?php
                if(isset($_GET['error'])){
                    echo $_GET['error'];
                }
                ?>
                </span>
                <div>
                <span style="font-size: 14px; margin-bottom: 0.125rem">Don't Have an account ? </span>
                <a href="signup.php" style="font-size: 14px">Signup now</a>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/validation.js""></script>
<?php include("includes/footer.php") ?>
    