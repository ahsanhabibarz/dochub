<?php include("includes/body.php");
include("includes/header.php") 
?>
    <?php if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }?>
    <div class="createPostcontainer">
    <form action="./includes/handlers/addpost.php" method="POST">
    <div class="createpostleft">
        <input type="text" name="title" minlength="10" maxlength="64"  placeholder="Title" required>
        <textarea type="text" name="description" maxlength="192" minlength="64"  placeholder="Short Description" required></textarea>
        <button class="bt" type="submit" name="submit">Post</button>
        <img src="./assets/images/createpost.svg" alt="">
    </div>
    <textarea name="editor1"></textarea>
    </form>
    <script>
        CKEDITOR.replace( 'editor1' , {
            height: '58vh',
            resize_enabled : true,
            fontFamily: {
            options: [
                'default',
                'Ubuntu, Arial, sans-serif',
                'Ubuntu Mono, Courier New, Courier, monospace'
            ]
        },
        } );
    </script>
    </div>