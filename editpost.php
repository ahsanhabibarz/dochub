<?php include("includes/body.php");
include("includes/header.php") 
?>
    <?php if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
    if(isset($_SESSION['user']) && isset($_GET['id'])){
        $postId = $_GET['id'];
    }
        $sql2 = "SELECT * FROM posts WHERE id ='" . $postId . "'";
        $stmt2 = $con->prepare($sql2);
        $stmt2->execute();
        $post = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

        $sql =  "SELECT name FROM users WHERE id ='" . $post[0]["posted_by"] . "'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $name = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    ?>
    <div class="createPostcontainer">
    <form action="./includes/handlers/edit-post-handler.php" method="POST">
    <div class="createpostleft">
        <input type="text" name="title" placeholder="Title" value= "<?php echo $post[0]['title']?>" required>
        <textarea type="text" name="description"  placeholder="Short Description" required><?php echo $post[0]['description']?></textarea>
        <div>
        <button class="bt" type="submit" name="submit">Update Post</button>
        <a class="abt"  style="margin-left: 1rem" href="<?php echo "./includes/handlers/delete-post.php?pid=".$post[0]["id"]?>">Delete Post</a>
        </div>
        <img src="./assets/images/createpost.svg" alt="">
    </div>
    <input type="hidden" name="id" value="<?php echo $postId; ?>" />
    <textarea name="editor1">
    <?php echo $post[0]['content']?>
    </textarea>
    </form>
    <script>
        CKEDITOR.replace( 'editor1' , {
            height: '58vh',
            resize_enabled : false,
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