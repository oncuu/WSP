<!DOCTYPE html>
<html>
<head>
<style>
  
  body { background-color:coral; } 
  form {
    max-width: 64em;
    margin: auto;
    text-align: center;
 }
 h1{
    list-style: none;
    display: block;
    position: relative;
    float:left;
    padding: 0;
        margin:0;
        height: 90px;
        width: 100%;
        background: #f5a67f;
     
        display:inline-block;
        box-shadow: 10px 10px 5px black;
        /* background colour of the bar */
    
}
</style>
</head>
<body>
<h1><b></b> <p style="text-align:center;">Congratulations, you've logged in. You can see some data</b></h1>
<br><br><br> <br><br>

<br><br>
<form action="displayData.php" method="post">
    <label for="searchName">Display according to name:</label>
    <input name="searchName" type="text"><br>
    <input name="sub" type="submit">
</form>
<form action="displayData.php" method="post">
    <label for="searchid">Display according to id:</label>
    <input name="searchid" type="text"><br>
    <input name="sub" type="submit">
</form>
<form action="displayData.php" method="post">
    <label for="searchSurname">Display according to surname:</label>
    <input name="searchSurname" type="text"><br>
    <input name="sub" type="submit">
   
</form>
<h2 style="color:#fcd3ac">All possible records</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$mysqli=mysqli_connect($servername, $username, $password,$dbname);
?>
<table border="2">
  <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Surname</td>
    <td>Press to delete</td>
  </tr>

<?php

         if(!$mysqli) {
            die("Connection failed: " . mysqli_connect_errno() .mysqli_connect_error());
        }else{
             
                $sql = "SELECT * FROM users.usersData";
                $result = mysqli_query($mysqli,$sql);
            
                if ($result->num_rows > 0) {
                    
                    // output data of each row of all database
                    while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Name and surname: " . $row["firstname"]. " " . $row["lastname"] ." - email: " . $row["email"]. "<br>";
                        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><a href="displayData.php?myNum=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>	
                    <?php
                    }
                } else {
                echo "0 results";
                }
                ?></table><?php
                mysqli_close($mysqli);
            }
    
        $mysqli=mysqli_connect($servername, $username, $password,$dbname);
        if (isset($_GET['myNum'])) {
        $what2look4 = $_GET['myNum'];

            $del = mysqli_query($mysqli,"delete from users.usersData where usersData.id = '$what2look4'"); 
            
            if($del)
            {
                mysqli_close($mysqli); 
              
            }
            else
            {
                echo "Error deleting record"; 
            }
        }  
        
?>
<h2 style="color:#fcd3ac">Chosen filtered records</h2>

<?php


$mysqli=mysqli_connect($servername, $username, $password,$dbname);
if(!$mysqli) {
    die("Connection failed: " . mysqli_connect_errno() .mysqli_connect_error());
}else{
    if(isset($_POST['searchName'])){
        //if something was submitted in the name, then we save its value and
        //perform a query which choses just records with that name
        $searchName = isset($_POST['searchName']) ? $_POST['searchName'] : '';
        $sql = "SELECT * FROM users.usersData WHERE usersData.firstname= '$searchName'";
        $result = mysqli_query($mysqli,$sql);
    
    }else if(isset($_POST['searchid'])){
        //if something was submitted in the id, then we save its value and
        //perform a query which choses just records with that id
        $searchID = isset($_POST['searchid']) ? $_POST['searchid'] : '';
        $sql = "SELECT * FROM users.usersData WHERE usersData.id=$searchID";
        $result = mysqli_query($mysqli,$sql);
    
    }else if(isset($_POST['searchSurname'])){
          //if something was submitted in the surname, then we save its value and
        //perform a query which choses just records with that surname
        $searchSurname = isset($_POST['searchSurname']) ? $_POST['searchSurname'] : '';
        $sql = "SELECT * FROM users.usersData WHERE usersData.surname='$searchSurname'";
        $result = mysqli_query($mysqli,$sql);
    }
    if ($result->num_rows > 0) {
        // output data of each row that has been filtered
        while($row = $result->fetch_assoc()) {
            
            echo "Id-" . $row["id"]. " Name and Surname-" . $row["firstname"] . $row["lastname"] . " email-". $row["email"] ;
        
        }
} else {
    echo "0 results";
}
    mysqli_close($mysqli);
       
    
    

}

  
?>  

</body>
</html>