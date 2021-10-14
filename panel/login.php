<?php
include 'process.php'; 

// echo $file ;
if (isset($_GET["id"])) {  $id = $_GET["id"]; }
$action='';
if (isset($_GET["action"])) {$action = $_GET["action"];} 
if (isset($_POST["action"])) {$action = $_POST["action"];} 


//echo $action;
if (isset($_POST["id"])) {  $id = $_POST["id"]; }
if (isset($_POST["mail"])) {  $mail = $_POST["mail"]; }
if (isset($_POST["password2"])) {$password2 = $_POST["password2"];} 

if ($action == 'exit') {
  echo 'Cikiyorum';
  unset($_SESSION["mail"]);
  session_destroy();
  header('Location: index.php'); 
  exit;
}

else if( $action == 'send') {


  $data_query = mysqli_query($conn, "SELECT * FROM users WHERE mail='$mail' AND password2='$password2'");
  while ($row = @mysqli_fetch_array($data_query)) {
      $mailDB = $row["mail"];
      $passwordDB = $row["password2"];
  }

  if ( $mail == $mailDB AND $password2 == $passwordDB) {
    echo 'Giris Basarili';
    $_SESSION["mail"] = $mail;
    header('Location: index.php');
  }
  else {
    echo 'Basarisiz';
  }

}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Teaching MS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link rel="stylesheet" href="css/style.css">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container" id="maincontainer">
      <div class="row" id ="login-row">
      <form action="login.php" method="POST">
        <input type="hidden" name="action" value="send">         
          <div class="form-group">
            <label>E-Mail</label>
            <input type="text" name="mail" class="form-control" value="">
          </div>
  
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password2" class="form-control" value="">
          </div>

        <div class="form-group">
          <button type="submit" name="send" class="btn btn-dark">Login</button>
        </div>
        </form>


        
        
      </div>


      
    </div>


  

   
<script src="script.js"></script>  
</body>
    
<!-- Footer -->

</html>