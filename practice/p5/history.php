<!DOCTYPE html>
<html>
    <head>
        <title>Password History</title>
    </head>
    <body>
        <table border = "1" cellpadding="10" style="text-align: center" align="center">
            <?php
                session_start();
                $counter = 0;
                for($i = 0; $i < count($_SESSION['passes']); $i++) {
                    if($counter == 0)
                        echo "<tr>";
                    
                    echo "<td>". $_SESSION['passes'][$i] . "</td>";
                    $counter++;
                    
                    if($counter == 4 || $i == count($_SESSION['passes'])-1) {
                        echo "</tr>";
                        $counter = 0;
                    }
                }
            ?>
        </table>
    </body>
</html>