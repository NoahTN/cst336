<?php
$usernames = array("eddy","ted","teddy","eddie","edward");
if  (in_array($_GET['username'], $usernames)) {
  echo "Unavailable";
} else if(!empty($_GET['username'])){
  echo "Available";
}
?>
