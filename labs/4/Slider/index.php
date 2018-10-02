<?php
    $backgroundImage = "img/sea.jpg";
    
     if(!empty($_GET['keyword']) || !empty($_GET['category'])) {
        if(!empty($_GET['category']))
            $_GET['keyword'] = $_GET['category'];
        
        echo "You searched for " . $_GET['keyword'];
        include 'api/pixabayAPI.php';
        $imageURLS = getImageURLs($_GET['keyword'], $_GET['layout']);
        $backgroundImage = $imageURLS[array_rand($imageURLS)];
       
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    
    <body>
        <br><br>
        <?php
        
            if(!isset($imageURLS)) {
                echo "<h2>Type a keyword to display a slideshow <br> with random images from Pixabay.com </h2>";
            }
            else {
        
        ?>
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="display: inline-block">
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
               <ol class="carousel-indicators">
               <?php
                    for($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'";
                        echo ($i==0)?" class='active'":"";
                        echo "></li>";
                    }
               ?>
               </ol>
                   
            <?php
                echo '<div class="carousel-inner">';
                for($i = 0; $i < 7; $i++) {
                    $randVal = rand(0, count($imageURLS));
                    echo '<div class="carousel-item ';
                    echo ($i == 0)?"active":"";
                    echo '">';
                    echo '<img src="'. $imageURLS[$randVal] . '">';
                    echo '</div>';
                    
                    unset($imageURLS[$randVal]);
                    $imageURLS = array_values($imageURLS);
                }
                echo "</div>";
                echo '<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">';
                echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                echo  '<span class="sr-only">Previous</span>';
                echo '</a>';
                echo '<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">';
                echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                echo '<span class="sr-only">Next</span>';
                echo '</a>';
                } // end else
            ?>
               
            </div>
        </div>
     
        <br>
        <form action="index.php">
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
            <input type="radio" id= "lhorizontal" name ="layout" value="horizontal">
            <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for"Vertical"></label><label for="lvertical">Vertical</label>
            <select name="category">
                <option value="">Select One</option>
                <option>Burger</option>
                <option>Chicken</option>
                <option>Soda</option>
                <option>Potato</option>
                <option>Money</option>
            </select>
            <input type="submit" value="Submit" />
        </form>
        <br><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>

<?php


?>