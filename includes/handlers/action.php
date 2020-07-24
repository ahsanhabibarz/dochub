<?php
    require("../config/connect.php");
    if(isset($_POST['query']) && $_POST['query'] != ''){
        $searchtext = $_POST['query'];
        $col = ['#e53935' , "#3949ab" , 'rgb(100, 92, 255)' ,  '#43a047' , '#5D21D2' , '#000'] ;
        $sql = "SELECT * FROM posts where title like '%$searchtext%'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($posts as &$value) {
            $sql2 = "SELECT * FROM users WHERE id ='" . $value["posted_by"] . "'";
            $stmt2 = $con->prepare($sql2);
            $stmt2->execute();
            $postedBy = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
            $num = rand(0,2);

            $icon =" ";

                if($postedBy[0]['status'] === 1){
                    $icon = "<span><i class='material-icons' style='color:green; font-size: 20px; margin: 0px 0.5rem'>verified_user</i></span>";
                }else{
                    $icon = "<span><i class='material-icons' style='color:#999; font-size: 20px; margin: 0px 0.5rem'>verified_user</i></span>";
                }

            $texthtml = $value['content'];
                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $texthtml, $image);

                $imgHtml ='';
                if($image){
                    $imgHtml = "<img class='postThumb' src='".$image['src']. "'alt=''>";
                }

                echo "<a href='post.php?id=".$value['id']."'> <div class='post'>
                ".$imgHtml."
                <h5>" . $value['title'].  "</h5>
                <div style='display: flex; align-items:center'>
                <span class='postedby' style='font-size: 13px; font-weight: 600; color: ".$col[4]." '>" . $postedBy[0]['name'].  "</span>
                ".$icon."
                <span style='font-size: 12px; font-weight: 600; color: ".$col[5]." '>" . $value['created_at'].  "</span>
                </div>
                <p>
                ". preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $value['description'])  .  "
                </p>
            </div> </a>";
        }
    }else{
        $col = ['#e53935' , "#3949ab" , 'rgb(100, 92, 255)' ,  '#43a047' , '#5D21D2' , '#000'] ;
            $sql = "SELECT * FROM posts";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            foreach ($posts as &$value) {
                $sql2 = "SELECT * FROM users WHERE id ='" . $value["posted_by"] . "'";
                $stmt2 = $con->prepare($sql2);
                $stmt2->execute();
                $postedBy = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
                $num = rand(0,2);
                $icon =" ";

                if($postedBy[0]['status'] === 1){
                    $icon = "<span><i class='material-icons' style='color:green; font-size: 20px; margin: 0px 0.5rem'>verified_user</i></span>";
                }else{
                    $icon = "<span><i class='material-icons' style='color:#999; font-size: 20px; margin: 0px 0.5rem'>verified_user</i></span>";
                }

                $texthtml = $value['content'];
                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $texthtml, $image);

                $imgHtml ='';
                if($image){
                    $imgHtml = "<img class='postThumb' src='".$image['src']. "'alt=''>";
                }

                echo "<a href='post.php?id=".$value['id']."'> <div class='post'>
                ".$imgHtml."
                <h5>" . $value['title'].  "</h5>
                <div style='display: flex; align-items:center'>
                <span class='postedby' style='font-size: 13px; font-weight: 600; color: ".$col[4]." '>" . $postedBy[0]['name'].  "</span>
                ".$icon."
                <span style='font-size: 12px; font-weight: 600; color: ".$col[5]." '>" . $value['created_at'].  "</span>
                </div>
                <p>
                " . preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $value['description'])  . "
                </p>
            </div> </a>";
            }
    }
?>