<?php
  require 'vendor/autoload.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $uri = "mongodb+srv://admin:kanishk@cluster0.y9yu9.mongodb.net/monitor?retryWrites=true&w=majority";
    $client = new MongoDB\Client($uri);
    $db = $client->monitor;
    $entries = $db->entries;
    
    $json = file_get_contents('php://input');
    $data = (array) json_decode($json);
    var_dump($json);
    var_dump($data);

    if (count($_POST)==7){
      //$data['id']=intval($data['id']);
      //$entries->insertOne($data);
      echo "Reported successfully.";
    }

    else{
      echo "Invalid data!";
    }

  }
  else{
    echo "<h2> This page is for accident reporting purpose! </h2>";
  }

  http_response_code(200);
?>
