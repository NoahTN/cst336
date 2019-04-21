<?php
require __DIR__ . '/composer/vendor/autoload.php';
use Google\Cloud\Translate\TranslateClient;
include "db/database.php";

$output = array();
if(!empty($_GET["dialect"])) {
	# select all entries containing the selected languages
    $sql = "SELECT
                phrase1, 
                phrase2,
                t1.languageCode as lang1,
                t2.languageCode as lang2
            FROM contributions
            LEFT JOIN language AS t1 ON contributions.language1 = t1.id
            LEFT JOIN language AS t2 ON contributions.language2 = t2.id
            WHERE (t1.languageCode = '".$_GET["sourceLang"]."'
                AND t2.languageCode = '".$_GET["targetLang"]."'
                AND contributions.dialect2='".$_GET["dialect"]."'
                AND contributions.phrase1= '".$_GET["message"]."')
            OR (t2.languageCode = '".$_GET["sourceLang"]."'
                AND t1.languageCode = '".$_GET["targetLang"]."'
                AND contributions.dialect1='".$_GET["dialect"]."'
                AND contributions.phrase2= '".$_GET["message"]."')
            LIMIT 1";
            
    $dbConn = getDatabaseConnection();
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll();
}

// check if slang text exists
if(!empty($records[0])) {
    // if message is part of column set one, get the contents of column set two
    if($records[0]["phrase1"]==$_GET["message"] && $records[0]["lang1"] == $_GET["sourceLang"])
        $output["slangText"] = $records[0]["phrase2"];
    // else slang doesn't exist, get the opposite
    else
        $output["slangText"] = $records[0]["phrase1"];    
}

// get Google Translate result if not same language
if($_GET["sourceLang"] != $_GET["targetLang"]) {
    $projectId = getenv('PROJ_ID');
    $translate = new TranslateClient(['projectId' => $projectId]);
	
    $text = $_GET["message"];
    $source = $_GET["sourceLang"];
    $target = $_GET["targetLang"];
  
    $output["convertedWord"] = $translate->translate($text, ['source' => $source, 'target' => $target]);
}
// else same language, output unchanged text
else {
    $output["convertedWord"]["text"] = $_GET["message"];
}
echo json_encode($output);
?>
