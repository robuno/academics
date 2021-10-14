<?php
include 'process.php'; 
if ($_SESSION["mail"] == "") {
  header('Location: login.php'); 
  exit;
}
else {
$sessionMail = $_SESSION["mail"];
}

// echo $file ;
if (isset($_GET["id"])) {  $id = $_GET["id"]; }
$action='';

if (isset($_GET["action"])) {$action = $_GET["action"];} 
if (isset($_POST["action"])) {$action = $_POST["action"];} 

//echo $action;
if (isset($_POST["id"])) {  $id = $_POST["id"]; }
if (isset($_POST["mobilephone"])) {  $mobilephone = $_POST["mobilephone"]; }
if (isset($_POST["phone"])) {$phone = $_POST["phone"];} 
if (isset($_POST["email"])) {$email = $_POST["email"];} 
if (isset($_POST["personalemail"])) {  $personalemail = $_POST["personalemail"]; }
if (isset($_POST["scholar"])) {  $scholar = $_POST["scholar"]; }
if (isset($_POST["linkedin"])) {$linkedin = $_POST["linkedin"];} 
if (isset($_POST["twitter"])) {$twitter = $_POST["twitter"];} 
if (isset($_POST["github"])) {  $github = $_POST["github"]; }
if (isset($_POST["youtube"])) {  $youtube = $_POST["youtube"]; }
if (isset($_POST["medium"])) {$medium = $_POST["medium"];} 
if (isset($_POST["addressc"])) {  $addressc = $_POST["addressc"]; }


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
<nav class="navbar navbar-expand-lg navbar-light">
  <!-- <a class="navbar-brand" href="#">Panel</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item ">
          <a class="nav-link" href="panel_about.php">About Me</a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="panel_news.php">News</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="panel_publications.php">Publications</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="panel_research.php">Research</a>
      </li>
      <li class="nav-item ">
          <a class="nav-link" href="panel_teaching.php">Teaching</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="panel_contact.php">Contact<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    
<body>
    <div class="container" id="maincontainer">
      <div class="row">
        <div class="col-md" id="panel-publications">
          <div class="panel-pub-text">
            <h1>Contact Manage System</h1>
            <a href="../contact.php"><i class="fas fa-external-link-alt"></i>Go To "contact" Page</a>
          </div>
          

          <?php 
                    
                       
                   
                    if ($action=='update') 
                    {
                      
                    
                         
                        $update = "UPDATE contact SET
                        contact.phone = '$phone',
                        contact.mobilephone = '$mobilephone',
                        contact.email = '$email',
                        contact.personalemail = '$personalemail',
                        contact.scholar = '$scholar',
                        contact.linkedin = '$linkedin',
                        contact.twitter = '$twitter',
                        contact.github = '$github',
                        contact.youtube = '$youtube',
                        contact.medium = '$medium',
                        contact.addressc = '$addressc'
                        WHERE contact.id = 1
                        ";

                        
                      
                        if ($conn -> query($update)) {
                            echo '<div class="data-change-info">Updated!</div>';        
                        } else {
                            echo $conn->error;
                        }
                    }  
                    
                        $data_query = mysqli_query($conn, "SELECT * FROM contact WHERE id=1 ");
                        while ($row = @mysqli_fetch_array($data_query)) {
                            $id = $row["id"];
                            $phone = $row["phone"];
                            $mobilephone = $row["mobilephone"];
                            $email = $row["email"];
                            $personalemail = $row["personalemail"];
                            $scholar = $row["scholar"];
                            $linkedin = $row["linkedin"];
                            $twitter = $row["twitter"];
                            $github = $row["github"];
                            $youtube = $row["youtube"];
                            $medium = $row["medium"];
                            $addressc = $row["addressc"];
                        }
                        
                        echo '
                        <form action="panel_contact.php" method="POST">
                          <input type="hidden" name="action" value="update">
                          <input type="hidden" name="id" value="'.$id.'">
                          
                            
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" name="phone" class="form-control" value="'.$phone.'">
                            </div>

                            <div class="form-group">
                              <label>Mobile Phone</label>
                              <input type="text" name="mobilephone" class="form-control" value="'.$mobilephone.'">
                            </div>

                            <div class="form-group">
                              <label>E-Mail</label>
                              <input type="text" name="email" class="form-control" value="'.$email.'">
                            </div>

                            <div class="form-group">
                              <label>Personal E-Mail</label>
                              <input type="text" name="personalemail" class="form-control" value="'.$personalemail.'">
                            </div>

                            <div class="form-group">
                              <label>Google Scholar</label>
                              <input type="text" name="scholar" class="form-control" value="'.$scholar.'">
                            </div>

                            <div class="form-group">
                              <label>LinkedIn</label>
                              <input type="text" name="linkedin" class="form-control" value="'.$linkedin.'">
                            </div>

                            <div class="form-group">
                              <label>Twitter</label>
                              <input type="text" name="twitter" class="form-control" value="'.$twitter.'">
                            </div>

                            <div class="form-group">
                              <label>Github</label>
                              <input type="text" name="github" class="form-control" value="'.$github.'">
                            </div>

                            <div class="form-group">
                              <label>YouTube</label>
                             <input type="text" name="youtube" class="form-control" value="'.$youtube.'">
                            </div>

                            <div class="form-group">
                              <label>Medium</label>
                              <input type="text" name="medium" class="form-control" value="'.$medium.'">
                            </div>
 
                            <div class="form-group">
                              <label>Address</label>
                              <textarea type="text" name="addressc" class="form-control" rows="5">'.$addressc.'</textarea>
                            </div>

                          <div class="form-group">
                          <button type="submit" name="save" class="btn btn-dark">Update Contacts</button>
                          </div>
                        </form> ';
                    

 
            ?>
        </div>
      </div>


      
    </div>

    <!-- <div class="container" id="table-new-user">
      <div class="row">
        <a href="panel_contact.php?action=new"><button class="btn btn-outline-dark">Add New Contact</button></a>            
      </div>
    </div> -->
    
        


   
<script src="script.js"></script>  
</body>
    
<!-- Footer -->

</html>