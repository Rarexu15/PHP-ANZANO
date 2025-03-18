<!-- 
// /*** mysql hostname ***/
// $host="localhost";

// /*** mysql username ***/
// $user="root";

// /*** mysql password ***/
// $pass="";

// /** name of database in phpadmin **/
// $db="login_db";

// $conn=new mysqli($host,$user,$pass, $db);
// if ($conn->connect_error){
//     echo "Failed to Connect  DB".$conn->connect_error;
// }
//  -->
<?php
$host = "localhost";
$username = "root";  
$password = "";  
$dbname = "login_db"; 

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

