<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        <?php include "inc/apis.php" ?>
    </head>
    <body>
	    <!--Add main menu here -->
            <?php include "inc/header.php" ?>
               <div id="demo" class="carousel slide" data-ride="carousel" style="display: inline-block">
                    <!-- The slideshow -->
                    <div class="carousel-inner"></div>
                    
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <br>
                <a style="margin-top: 25px" class="btn btn-primary" href="adoptions.php" role="button">Adopt Now!</a>
    </body>
</html>