<?php
require_once(__DIR__ . '/phpmongodb/vendor/autoload.php');
$dbname = 'test';

// $collection = (new MongoDB\Client)->local->startup_log;
// $books = $collection->find([]);

// foreach ($books as $entry) {
// 	echo $entry['_id'];
//  }mongodb+srv://kavinkumarab:@cluster0.gsdbfi0.mongodb.net/?retryWrites=true&w=majority

$con = new MongoDB\Client("mongodb://kavinkumarab:8rpHrWFwoAQ3KqMf@cluster0-shard-00-00.2twek.mongodb.net:27017,cluster0-shard-00-01.2twek.mongodb.net:27017,cluster0-shard-00-02.2twek.mongodb.net:27017/test?ssl=true&replicaSet=atlas-6wx29r-shard-0&authSource=admin&w=majority");
 $db = $con->selectDatabase('test');  
 $col = $db->selectCollection('users');
 $sql = $col->find();
 foreach($sql as $cols)
{
    var_dump($cols);
}
// if ($client) {
// 	$customers = $client->selectCollection('sample_analytics', 'customers');
//    $document = $customers->findOne(['username' => 'wesley20']);

//    var_dump($document);
	
// 	die("Database connected");
// } else {
// 	die("Database are not connected");
// }
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpzag_demos";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

if (isset($_POST['btn-save'])) {
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['password'];
	$sql = "SELECT email FROM users WHERE email='$user_email'";
	$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);
	if (!$row['email']) {
		$sql = "INSERT INTO users(`uid`, `user`, `pass`, `email`, `profile_photo`) VALUES (NULL, '$user_name', '$user_password', '$user_email', NULL)";
		mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn) . "qqq" . $sql);
		echo "registered";
	} else {
		echo "1";
	}
}


?>
