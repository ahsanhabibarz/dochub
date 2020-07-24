<?php include("includes/body.php") ?>
    <?php include("includes/header.php") ?>
    <?php
        if(isset($_GET['id'])){
            $postId = $_GET['id'];
        }
        if(isset($_COOKIE["prevpost"])){
            $postidArray = unserialize($_COOKIE['prevpost'], ["allowed_classes" => false]);
            if(!in_array($_GET['id'] , $postidArray)){
                if(count($postidArray) > 3){
                    array_splice($postidArray, 1, 1);
                    array_push($postidArray, $_GET['id']); 
                    setcookie("prevpost" , serialize($postidArray) , time() + (86400 * 2));
                }else{
                    array_push($postidArray, $_GET['id']);
                    setcookie("prevpost" , serialize($postidArray) , time() + (86400 * 2));
                }
            }
        }else{
            $firstArray = [$_GET['id']];
            setcookie("prevpost" , serialize($firstArray), time() + (86400 * 2));
        }
            
    ?>
    <div class="postDetailsContainer">
    <?php include("includes/sidebar.php") ?>
        <?php 
            $sql2 = "SELECT * FROM posts WHERE id ='" . $postId . "'";
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute();
            $post = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
        ?>

        <?php 
        $sql =  "SELECT * FROM users WHERE id ='" . $post[0]["posted_by"] . "'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $name = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $icon ="";

            if($name[0]['status'] === 1){
                $icon = "<span><i class='material-icons' style='color:green; font-size: 20px; margin: 0px 0.5rem'>verified_user</i></span>";
            }else{
                $icon = "<span><i class='material-icons' style='color:#999; font-size: 20px; margin: 0px 0.5rem'>verified_user</i></span>";
            }

        ?>
        <div class="fullPost">
            <div class="postDetails">
                <div class="postHeader" style="display:flex; justify-content:space-between; align-items: center">
                    <div>
                        <h2 style="margin-bottom: 0.5rem"><?php echo $post[0]['title']?></h2>
                    <a href=<?php echo "profile.php?id=".$name[0]['id']."" ?>>
                    <div id="viewProfile" style="display: flex">
                    <span style='font-size: 16px; font-weight: bold;'><?php echo "By  " . $name[0]['name'] ?></span>
                    <?php echo $icon?>
                    </div>
                    </a>
                    <span style='font-size: 12px; font-weight: bold; color:grey' > <?php echo $post[0]['created_at']?> </span>
                    </div>
                    <?php 
                        if(isset($_SESSION['user']) && $post[0]["posted_by"] == $_SESSION['user'][0]){
                            echo "<a class='roundHref' style='margin-bottom:1rem' href='editpost.php?id=".$postId."'><i class='material-icons' style='font-size: 18px'>edit</i></a>";
                        }
                        ?>
                    </div>
                </div>
                <div class="postContents">
                    <?php echo $post[0]['content']?>
                </div>
            </div>
            <div>
            </div>
        </div>
        <h3 style="margin-left: 1.5rem">Perviously Visited Posts</h3>
        <div class="postContainer m1" id="postContainer">
        <?php 
                if(isset($_COOKIE['prevpost'])) {
                    foreach (unserialize($_COOKIE['prevpost'], ["allowed_classes" => false])as &$id) {
                    if(is_numeric($id)){  //Cookie Validation
                            $sql = "SELECT * FROM posts WHERE id ='" . $id . "'";
                            $stmt = $con->prepare($sql);
                            $stmt->execute();
                            $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                            $texthtml = $posts[0]['content'];
                            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $texthtml, $image);
        
                            $imgHtml ='';
                            if($image){
                                $imgHtml = "<img class='postThumb' style='width: 20%' src='".$image['src']. "'alt=''>";
                            }
        
                            echo "<a href='post.php?id=".$posts[0]['id']."'> <div class='post'>
                            ".$imgHtml."
                            <h5>" . $posts[0]['title'].  "</h5>
                            <div style='display: flex; align-items:center'>
                            <span style='font-size: 12px; font-weight: 600; '>" . $posts[0]['created_at'].  "</span>
                            </div>
                            <p>
                            " . preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $posts[0]['description'])  .  "
                            </p>
                        </div> </a>";
                        }
                    }
                }
            ?>
        </div>


    <?php include("includes/footer.php") ?>