<ul class="nav nav-tabs">
    
<?php
    if(strpos($_SERVER['REQUEST_URI'], 'index') !== false)
        $homeActive = "active";
    else if(strpos($_SERVER['REQUEST_URI'], 'adoptions') !== false)
        $adoptActive = "active";
    else
        $aboutActive = "active";
        
    echo '<li class="nav-item">';
        echo "<a class='nav-link $homeActive' href='index.php'>Home</a>";
    echo '</li>';
    echo '<li class="nav-item">';
        echo "<a class='nav-link $adoptActive' href='adoptions.php'>Adoptions</a>";
    echo '</li>';
    echo '<li class="nav-item">';
        echo "<a class='nav-link $aboutActive' href='about.php'>About Us</a>";
    echo '</li>';
    
?>
            
</ul>
<h1> CSUMB Animal Shelter</h1>
<h2 style="color: grey"> The "official" animal adoption website of CSUMB </h2>
