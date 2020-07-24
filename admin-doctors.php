<?php include("includes/body.php") ?>
<?php include("includes/admin-header.php") ?>
    <div class="adminContainer">
        <h3>Doctors</h3>
        <div class="adminPosts adminDoc" style="margin-top: 1rem">
        <?php
            // print_r($_SESSION);
            $col = ['#e53935' , "#3949ab" , 'rgb(100, 92, 255)' ,  '#43a047' , '#5D21D2' , '#999'] ;
            $sql = "SELECT * FROM users ORDER BY name";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            foreach ($posts as &$value) {
                
                $icon;

                if($value['status'] === 0){
                    $icon =  "<a style='display: flex; align-items:center' href='./includes/handlers/verify-doctor.php?id=".$value['id']."'><i class='material-icons' style='display: flex; align-items: center'>mouse</i></a>";
                }else{
                    $icon = "<span style='display: flex; align-items:center' ><i class='material-icons' style='color:green; display: flex; align-items: center'>verified_user</i></span>";
                }

                $num = rand(0,2);
                echo "<div class='post postadmin'>
                <div style='display:flex; align-items: center'>
                <span class='profileImg' style='margin-left:0px'><span>".substr($value['name'], 0, 1)."</span></span>
                <div  style='margin-left: 1rem'>
                <h4>" . $value['name'].  "</h4>
                <span class='docinfo'>" . $value['email'].  "</span>
                <span class='docinfo'>" . $value['education'].  "</span>
                <span class='docinfo'>" . $value['designation'].  "</span>
                </div>
                </div>".$icon."
            </div>";
            }
        ?>
        </div>
    </div>
<?php include("includes/footer.php") ?>