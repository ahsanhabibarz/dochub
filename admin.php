<?php include "includes/body.php"?>
<?php include "includes/admin-header.php"?>
    <div class="adminContainer">
        <h2>Dashboard</h2>
        <div class="cardHolder">
            <div class="card">
                <div>
                    <i class="fas fa-users"></i>
                    <span>Total Users:</span>
                </div>
                <span>3251+</span>
            </div>
            <div class="card">
                <div>
                    <i class="fas fa-user-md"></i>
                    <span>Total Doctors:</span>
                </div>
                <?php
                    $sql = "SELECT * FROM users";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    echo "<span>" . count($posts) . "+</span>"
                    ?>
            </div>
            <div class="card">
                <div>
                    <i class="far fa-plus-square"></i>
                    <span>Total Posts:</span>
                </div>
                <?php
                    $sql = "SELECT * FROM posts";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $posts = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    echo "<span>" . count($posts) . "+</span>"
                    ?>
            </div>
        </div>
        <div class="topicUpdater">                
            <form style="display:flex; flex-direction: column ;" action="./includes/handlers/topic-handler.php" method="POST">
                <h3>Change Youtube Topic</h3>    
                <input type="text" name="topic" placeholder="Topic" required="true">
                <button class="bt">Update Topic</button>
            </form>
        </div>
    </div>
<?php include "includes/footer.php"?>