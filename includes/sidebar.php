<div class="sideBar">
            <!-- <video class="sideVid" src="assets/video/video.mp4" autoplay="true" loop="true"></video>   -->
            <div class="weather">
                <video style="position: absolute; top: 0; left:0" class="sideVid" src="assets/video/weather.mp4" autoplay=true loop=true></video>
                <div style="position:absolute; bottom: 1rem; left:1rem;right:1rem; color: white">
                    <?php
                        $weather = null;
                        if($sock = @fsockopen('www.google.com', 80)){
                            $response = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Dhaka&units=metric&APPID=41e0501d54dabb356f687094624010d0');
                            $weather = json_decode($response);
                        }
                    ?>
                    <img class="headerImg" src="./assets/images/weather-girl.svg" alt="">
                    <h3 style="margin-bottom: 0px">Dhaka , Bangladesh</h3>
                    <div style="display: flex; align-items:center; justify-content: space-between">
                        <div>
                            <h4><?php
                            if($weather)
                            echo $weather->weather[0]->main ?></h4>
                            <span style="font-size: 14px ; font-weight: bold"><?php if($weather) echo $weather->main->temp . "°C"  ?></span>
                        </div>
                        <div>
                            <i class="fas fa-cloud-sun" style="font-size: 32px"></i>
                        </div>
                    </div>
                    <span style="font-size: 13px;font-weight: bold"><?php  if($weather) echo "Humidity " . $weather->main->humidity ?> </span>
                </div>
            </div>
            <div class="suggestions">
                <img class="headerImg"src="./assets/images/suggestion.svg" alt="">
                <h3>Health Tips</h3>
                <span>
                <?php 
                    echo "Whole eggs are so nutritious that they’re often termed “nature’s multivitamin”"
                    ?>
                </span>
                <button class="bt" style="margin-top: 0.575rem; padding: 0.475rem 0.675rem" onClick = "displayNotification()">Show Tips</button>          
            </div>
            <div class="suggestions">
                <img class="headerImg" style="width: 42%"  src="./assets/images/ai.svg" alt="">
                <div>
                <a href="docbot.php" style="font-weight:bold">Talk with Docbot</a>  
                </div>           
            </div>
            <div class="suggestions">
                <img class="headerImg" style="width: 42%"  src="./assets/images/youtube.svg" alt="">
                <div>
                <a href="youtubeapi.php" style="font-weight:bold">DocHub Health Videos</a>  
                </div>           
            </div>
            <div class="suggestions">
                <img class="headerImg" style="width: 42%"  src="./assets/images/news.svg" alt="">
                <div>
                <a href="globalapi.php" style="font-weight:bold">Global Health News</a>  
                </div>           
            </div>
</div>