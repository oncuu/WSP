<!DOCTYPE html>
<html>
<head>
<script>
function myFunction()
{
alert("Registration completed"); 
}
</script>

<style>
  /* web style changing depending on the saved cookies  */
  body { background-color:coral; } 
  form {
    max-width: 64em;
    margin: auto;
    text-align: center;
 }
  
</style>
</head>
<body>
<h1><b></b> <p style="text-align:center;">Registrate</b></h1>
<br><br>
    <form action="register.php" method="post">
    <label for="firstName">First Name:</label>
    <input name="firstName" type="text"><br>
    <label for="lastName">Last Name:</label>
    <input name="lastName" type="text"><br>
    <label for="email">Email:</label>
    <input name="email" type="text"><br>
    
    <label for="password">Password:</label>
    <input name="password" type="password"><br>
    <input name="sub" type="submit">
</form>

<?php
// <!-- if there was something sent to the server  we go further -->
if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['firstName'])&&isset($_POST['lastName'])){
   
      $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
      $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $pass = isset($_POST['password']) ? $_POST['password'] : '';
    //Validation if name starts with big letter
    if(preg_match('~^\p{Lu}~u', $firstName)==0){
        echo "Name should start with capital letter";
        //Validation if surname starts with big letter
    }else if(preg_match('~^\p{Lu}~u', $lastName)==0){
        echo "Last name should start with capital letter";
//Validation if email has a correct format
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Incorrect format of email";
    }else{
        //If validation passed, we establish connection to database with logging values
        $servername = "localhost";
        $username = "root";
        $pa = "";
        $dbname = "users";
       
        $mysqli=mysqli_connect($servername, $username, $pa,$dbname);
    
        
                 if(!$mysqli) {
                    die("Connection failed: " . mysqli_connect_errno() .mysqli_connect_error());
                }else{
                    //if connection has been establish we create query that inserts our new user data into the database
                    $sql4 = "INSERT INTO users.usersData (firstname, lastname,email,pass)
                    VALUES ('$firstName','$lastName', '$email', '$pass')";
                    if (mysqli_query($mysqli,$sql4)) {
                        echo "Registered sucessfully<br />";
                                        
                        sleep(3);
                        //if data were inserted, user is moved to the logging page
                        header('Location: login.php');
                    }else{
                        echo "Error adding data: " .mysqli_error($mysqli);
                    }
                    mysqli_close($mysqli);
                }
        

    } 
}
?>


</body>
</html>