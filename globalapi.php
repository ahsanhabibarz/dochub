<?php include("includes/body.php") ?>
    <?php include("includes/header.php") ?>
    <div class="container" style="grid-template-columns: 1fr">
    <?php
        $response = file_get_contents('https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=ba91afa5f6084f71b2420ba159962265');
        $articles = json_decode($response);
    ?>

    <div class="postContainer globalpost">
    <?php
    $col = ['#e53935' , "#3949ab" , 'rgb(100, 92, 255)' ,  '#43a047' , '#5D21D2' , '#999'] ;
    foreach ($articles->{'articles'} as &$value) {

        $imgHtml ='';
            if($value->urlToImage){
            $imgHtml = "<img class='postThumb' style='height: 100px; width: 40%; object-fit:cover ' src='".$value->urlToImage. "'alt=''>";
        }

        $writer = 'Unknown';
        if($value->author){
            if(strpos($value->author , '[') || strpos($value->author , '@') || strlen($value->author)>20){
                $writer = 'Unknown';
            }else{
                $writer = $value->author;
            }
            
        }

        echo "<a href='".$value->url."'> <div class='post'>
                ".$imgHtml."
                <h5>" . $value->title.  "</h5>
                <span class='postedby' style='font-size: 13px; font-weight: 600; color: ".$col[4]." '>" . $writer.  "</span>
                <span style='font-size: 12px; font-weight: 600; color: ".$col[5]." '>" . $value->publishedAt.  "</span>
                <p>
                " . preg_replace('/((\w+\W*){'.(20).'}(\w+))(.*)/', '${1}', $value->description)    .  "
                </p>
                </div> </a>";
     }
    ?>
    </div>
                
</div>