<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$mysqli=mysqli_connect($servername, $username, $password,$dbname);

// Check connection
         if(!$mysqli) {
            die("Connection failed: " . mysqli_connect_errno() .mysqli_connect_error());
        }else{
            echo('Connected successfully.<br />');
            //deleting a database query
            $sql1 = "DROP DATABASE IF EXISTS users";
            if (mysqli_query($mysqli,$sql1)) {
                echo "Table usersDatabase dropped successfully.<br />";
            }else{
                echo "Error deleting database: " .mysqli_error($mysqli);
            }
            mysqli_close($mysqli);
        }
        
?>

