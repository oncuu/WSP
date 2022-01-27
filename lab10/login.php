<!DOCTYPE html>
<html>
<head>
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
<h1><b></b> <p style="text-align:center;">Log in</b></h1>
<br><br>
<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input name="email" type="text"><br>
    
    <label for="password">Password:</label>
    <input name="password" type="password"><br>
    <input name="sub" type="submit">
</form>

<?php
<!-- if there was something sent to the server in fields login and password we go further -->
if(isset($_POST['email'])&&isset($_POST['password'])){
 
  
// saving value from a field
    $email = isset($_POST['email']) ? strtolower($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
      
    //login values to connect to database  
    $servername = "localhost";
    $username = "root";
    $pas = "";
    $dbname = "users";
  //establishing connection
    $mysqli=mysqli_connect($servername, $username, $pas,$dbname);


         if(!$mysqli) {
            die("Connection failed: " . mysqli_connect_errno() .mysqli_connect_error());
        }else{
            //if connection is established, we create two queries, one choosing password, one email
            $select1 = "SELECT pass FROM users.usersData WHERE email = '".$email."'";
            $select2 = "SELECT email FROM users.usersData WHERE pass = '".$password."'";
             //we perform queries on the database and save result in row
            $result1=mysqli_query($mysqli,$select1);
            $row1=$result1->fetch_assoc();
            $result2=mysqli_query($mysqli,$select2);
            $row2=$result2->fetch_assoc();
             //and we compare if the results were same as a data introduced to the webpage
            if($email == $row2["email"] && $password == $row1["pass"]) 
            { 
              //if data werre correct, than we start session saving email of the user and we move to the next page
              $_SESSION['email']= $_POST['email']?? "";;
              $_currentSessionId = session_id();
              setcookie('ses', $_currentSessionId,time() + (60 * 10));
              header('Location: displayData.php');
            }
            else
            {
                echo'The username or password are incorrect!';
            }
            mysqli_close($mysqli);
        }
    


      
    //   }else{
    //     // if yes, than we start a new session with that user
    //       session_start();
    //       // and we assign session the user and we store session id in a cookie
    //       $_SESSION['login']= $_POST['login']?? "";;
    //       $_currentSessionId = session_id();
    //       setcookie('ses', $_currentSessionId,time() + (60 * 5));
    //     //and we go to the next page as we are logged in
    //       header('Location: secondpage.php');
    //   }
}
?>


</body>
</html>