<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>That's my first website</title>
    <style>
    .myButton {
        text-align: center;
      
 }
 .myButton2 {
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
    p{
        margin: auto;
    text-align: center; 
    
    }
        </style>
</head>
<body style="background-color:coral;">

    <h1><b></b> <p style="text-align:center;">Welcome to our webpage</b></h1>
    <br><br> <br><br><br><br> <br><br>
    <h3> <p style="text-align:center;"> To look further log in or registrate</h3>
    <!-- Just choosing if we want to log or register -->
    <div class="myButton"><button onclick="location.href = 'login.php';"id="myButton" class="float-left submit-button" >Log in</button></div>
    <div class="myButton2"><button onclick="location.href = 'register.php';"id="myButton2" class="float-left submit-button" >Registrate</button></div>
    
    <br> <br><br>
    <p><img  width="500" 
     height="300" src="https://www.efsa.europa.eu/sites/default/files/styles/lg_col_12_16x9/public/2021-07/Bee-4.jpeg?h=199d8c1f&itok=GQk4rf8X" alt="Im promising to fix that next time" /></p>
    

  
  
</body>
</html>