<?php
  require 'vendor/autoload.php';
  header("Content-length: 0");
  http_response_code(200);

  echo "<h2> This page is for accident reporting purpose! </h2>";

  $uri = "mongodb+srv://admin:kanishk@cluster0.y9yu9.mongodb.net/monitor?retryWrites=true&w=majority";
  $client = new MongoDB\Client($uri);

  $db = $client->monitor;
  $entries = $db->entries;

  if ($_POST && count($_POST)==7){
    $_POST['id']=intval($_POST['id']);
    $entries->insertOne($_POST);
  }

?>
