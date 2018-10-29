<?php
    $dayCount;
    $vacDays = array();
    $current = array();
    
    function setLocations() {
        global $current;
        $usa = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
        $mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
        $france = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
        
        if($_GET['country']=='USA')
            $current = $usa;
        else if($_GET['country']=='Mexico')
            $current = $mexico;
        else
            $current = $france;
        shuffle($current);

        $current = array_slice($current, 0, $_GET['locNum']);

        if($_GET['order']=='ascend')
            sort($current);
        else if($_GET['order'] == 'descend')
            rsort($current);
    }
   
    
    function assignDates() {
        global $dayCount, $vacDays, $current;
        $days = array();
        
        if($_GET['month']=='November')
            $dayCount = 30;
        else if($_GET['month']=='December')
            $dayCount = 31;
        else if($_GET['month']=='January')
            $dayCount = 31;
        else if($_GET['month']=='February')
            $dayCount = 28;
        
        for($i = 0; $i < $dayCount; $i++)
            $days[] = $i;
        
        for($i = 0; $i < intval($_GET['locNum']); $i++) {
            $randVal = rand(0, count($days)-1);
            $vacDays[]['num'] = $days[$randVal];
            unset($days[$randVal]);
            $days = array_values($days);
        }
        sort($vacDays);
        
        for($i = 0; $i < count($vacDays); $i++) {
            $vacDays[$i]["loc"] = $_GET['country'] . "/".$current[0];
             
            if($current[0]=="las_vegas")
                $current[0] = "Las Vegas";
            else if($current[0]=="washington_dc")
                $current[0] = "Washington DC";
            else if($current[0]=="ny")
                $current[0] = "New York";
            else if($current[0]=="mexico_city")
                $current[0] = "Mexico City";
            else if($current[0]=="le_havre")
                $current[0] = "Le Havre";
            else
                $current[0] = ucfirst($current[0]);
                    
            $vacDays[$i]['name'] = $current[0];
            unset($current[0]);
            $current = array_values($current);
        }
        
    }

    function createCalendar() {
        global $dayCount, $vacDays;
        $count = 0;
        
        echo '<table border="1">';
        for($i = 0; $i < $dayCount; $i++) {
            if($count == 0)
                echo '<tr>';
            
            echo "<td>". ($i+1);
            if($i == $vacDays[0]['num']) {
                echo "<br>";
                echo "<img src='img/" . $vacDays[0]['loc'] . ".png' />";
                echo "<br>";
                echo $vacDays[0]['name'];
                unset($vacDays[0]);
                $vacDays = array_values($vacDays);
            }
            echo "</td>";
            $count++;
            
            if($count == 5 || $i == $dayCount-1) {
                echo '</tr>';
                $count = 0;
            }
        }
        echo '</table>';
    }
    
    function printItinerary() {
        echo "<div>";
        echo "<h1>".$_GET['month']." Itinerary</h1>";
        echo "<h2>Visiting ".$_GET['locNum']." places in ".$_GET['country'];
        echo "</div>";
    }
    
    function printStored() {
        echo "<div>";
        echo "<h1>Monthly Itinerary</h1>";
        session_start();
        $_SESSION["plans"][] = "Month: " . $_GET['month'] . ", Visiting ". $_GET['locNum'] .
                               " places in " . $_GET['country'];
        for($i = 0; $i < count($_SESSION["plans"]); $i++) {
            echo $_SESSION["plans"][$i];
            echo "<br>";
        }
        echo "</div>";
    }
    
 
?>