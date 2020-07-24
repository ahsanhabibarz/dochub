<?php include("includes/body.php") ?>
<?php include("includes/admin-header.php") ?>
    <div class="adminContainer">
        <h2>Posts</h2>
        <div class="adminPosts" style="margin-top: 1rem">
        <?php
            // print_r($_SESSION);
            $col = ['#e53935' , "#3949ab" , 'rgb(100, 92, 255)' ,  '#43a047' , '#5D21D2' , '#000'] ;
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            foreach ($posts as &$value) {
                $sql2 = "SELECT name FROM users WHERE id ='" . $value["posted_by"] . "'";
                $stmt2 = $con->prepare($sql2);
                $stmt2->execute();
                $postedBy = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
                $num = rand(0,2);

                $texthtml = $value['content'];
                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $texthtml, $image);

                $imgHtml ='';
                if($image){
                    $imgHtml = "<a href='post.php?id=".$value['id']."' target='_blank'><img class='postThumb postThumbadmin' src='".$image['src']. "'alt=''></a>";
                }

                echo "<div class='post postadmin'>
                ".$imgHtml."
                <div>
                <h4>" . $value['title'].  "</h4>
                <p style='margin-bottom: 0.5rem'>
                <span class='postedby' style='font-size: 13px; margin-left:0; font-weight: 600; color: ".$col[4]." '>" . $postedBy[0]['name'].  "</span>
                </p>
                <span style='font-size: 12px; font-weight: 600; color: ".$col[5]." '>" . $value['created_at'].  "</span>
                </div>
                <a href='./includes/handlers/delete-post.php?pid=".$value['id']."'> <i class='material-icons'>delete</i></a>
            </div> ";
            }
        ?>
        </div>
    </div>
<?php include("includes/footer.php") ?>