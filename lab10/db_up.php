<?php
//data needed to log to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
//creating a new connection 
$conn= new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database query
$sql = "CREATE DATABASE users";
// Create table in the database query
$sql2="CREATE TABLE users.usersData(
    id INT(3) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    pass VARCHAR(20),
    primary key(id))";
//Add records to the table query
$sql3 = "INSERT INTO users.usersData (firstname, lastname, email,pass)
VALUES ('Julia', 'Moska', 'mail@example.com','12345'),
('Kaan', 'Oncu', 'another@example.com','kaan123'),
('Name', 'Surname', 'email@example.com','passwd')
";
//if dataase was created sucessfully
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
  //if table was created sucessfully
  if ($conn->query($sql2) === TRUE) {
    echo "Table created sucessfully";
     //if records were added sucessfully
    if ($conn->query($sql3) === TRUE) {
        echo "Table filled with data sucessfully";
      }
  }
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>