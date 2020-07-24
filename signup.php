<?php include("includes/body.php");
    include("includes/config/connect.php");
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
?>

    <div class="loginContainer">
    <div class="login" style="padding: 1rem 2rem 2rem 2rem; height: auto ; margin: 1rem 0">
    <div>
        <img src="./assets/images/login.svg" alt="">
        </div>
        <form class="loginForm" id="signupform" action="./includes/handlers/signup-handler.php" method="POST">
            <h2>Sign Up</h2>
            <input type="text" name="sname" id="sname" placeholder="Name" required>
            <input type="email" name="semail" id="semail" placeholder="Email" required>
            <input type="text" name="seducation" id="seducation" placeholder="Education" required>
            <input type="text" name="sdesignation" id="sdesignation" placeholder="Designation" required>
            <input type="password" name="spass" id="spass" placeholder="Password" required>
            <input type="password" name="sconfirmpass" id="sconfirmpass" placeholder="Confirm Password" required>
            <div>
                <button type="submit">Signup</button>
            </div>
            <span class="errorspan">
                <?php
                if(isset($_GET['error'])){
                    echo $_GET['error'];
                }
                ?>
            </span>
            <div>
                <span style="font-size: 14px; margin-bottom: 0.125rem">Already Have an account ? </span>
                <a href="login.php" style="font-size: 14px">Signin now</a>
            </div>
        </form>
    </div>
    </div>
    <script src="assets/js/registration-validation.js""></script>
<?php include("includes/footer.php") ?>
    