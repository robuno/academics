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
$action = "";

if (isset($_GET["action"])) {$action = $_GET["action"];} 
if (isset($_POST["action"])) {$action = $_POST["action"];} 

//echo $action;
if (isset($_POST["id"])) {  $id = $_POST["id"]; }
if (isset($_POST["name"])) {$name = $_POST["name"];} 
if (isset($_POST["degree"])) {$degree = $_POST["degree"];} 
if (isset($_POST["department"])) {$department = $_POST["department"];} 
if (isset($_POST["school"])) {$school = $_POST["school"];} 
if (isset($_POST["bio"])) {$bio = $_POST["bio"];} 
if (isset($_POST["imglink"])) {$imglink = $_POST["imglink"];} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>About MS</title>
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
      <li class="nav-item active">
          <a class="nav-link" href="panel_about.php">About Me<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
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
      <li class="nav-item ">
          <a class="nav-link" href="panel_contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav>
    
<body>
    <div class="container" id="maincontainer">
      <div class="row">
        <div class="col-md" id="panel-publications">
          <div class="panel-pub-text">
            <h1>Biography Manage System</h1>
            <a href="../about.php"><i class="fas fa-external-link-alt"></i>Go To "About Me" Page</a>
          </div>
              


          <?php 
                    
                       
                   
                    if ($action=='update') 
                    {
                      
                    
                         
                        $update = "UPDATE about SET
                        about.name = '$name',
                        about.degree = '$degree',
                        about.department = '$department',
                        about.school = '$school',
                        about.bio = '$bio',
                        about.imglink = '$imglink'                   
                        WHERE about.id = 1
                        ";

                        
                      
                        if ($conn -> query($update)) {
                            echo '<div class="data-change-info">Updated!</div>';        
                        } else {
                            echo $conn->error;
                        }
                    }  
                    
                        $data_query = mysqli_query($conn, "SELECT * FROM about WHERE id=1 ");
                        while ($row = @mysqli_fetch_array($data_query)) {
                            $id = $row["id"];
                            $name = $row["name"];
                            $degree = $row["degree"];
                            $department = $row["department"];
                            $school = $row["school"];
                            $bio = $row["bio"];
                            $imglink = $row["imglink"];
                        }
                        
                        echo '
                        <form action="panel_about.php" method="POST">
                          <input type="hidden" name="action" value="update">
                          <input type="hidden" name="id" value="'.$id.'">
                          
                            
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" value="'.$name.'">
                            </div>

                            <div class="form-group">
                              <label>degree</label>
                              <input type="text" name="degree" class="form-control" value="'.$degree.'">
                            </div>

                            <div class="form-group">
                              <label>department</label>
                              <input type="text" name="department" class="form-control" value="'.$department.'">
                            </div>

                            <div class="form-group">
                              <label>school</label>
                              <input type="text" name="school" class="form-control" value="'.$school.'">
                            </div>


                            <div class="form-group">
                              <label>imglink</label>
                              <input type="text" name="imglink" class="form-control" value="'.$imglink.'">
                            </div>


                            <div class="form-group">
                            <label>bio</label>
                            <textarea type="text" name="bio" class="form-control" rows="40" >'.strip_tags($bio).'</textarea>
                          </div>

                          <div class="form-group">
                          <button type="submit" name="save" class="btn btn-dark">Update Contacts</button>
                          </div>
                        </form> ';
                    

 
            ?>


      
    </div>

      


   
<script src="script.js"></script>  
</body>
    
<!-- Footer -->

</html>