<?php
require_once(__DIR__ . '/phpmongodb/vendor/autoload.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token");

$client = new MongoDB\Client("mongodb+srv://kavinkumarab:8rpHrWFwoAQ3KqMf@cluster0.gsdbfi0.mongodb.net/test?retryWrites=true&w=majority");
$db = $client->selectDatabase('test');
$col = $db->selectCollection('users');

if (isset($_POST['username'])) {
	$user_email = trim($_POST['username']);
	$user_password = trim($_POST['password']);
    $document = $col->findOne(['name' => $user_email]);
    $document['status']=200;
    $json = json_encode( $document->getArrayCopy() );
    echo $json;
}
