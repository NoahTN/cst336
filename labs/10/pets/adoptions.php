<?php
    include "database.php";
    
    function getAllAnimalData() {
        $dbConn = getDatabaseConnection();
        $sql = "SELECT name, type FROM pets";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        foreach($records as $record) {
            echo "<div class='animalDiv'>Name: <a class='nameLink' href='' data-toggle='modal' data-target='#exampleModalCenter'>" . $record["name"] . "</a><button id='".$record["name"]."'type='button' class='btn adoptButton'
                data-toggle='modal' data-target='#exampleModalCenter'>Adopt Me! </button>" . "<br>Type: " . $record["type"] .  "</div><br>";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adoptions</title>
        <?php include "inc/apis.php" ?>
    </head>
    <body>
        <?php 
            include "inc/header.php"; 
            getAllAnimalData();
        ?>
        <img id="loadingIMG" src="img/loading.gif" alt="loading">
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img id="petIMG">
                <div id="mainText"></div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm Adoption</button>    
              </div>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>