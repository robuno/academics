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
if (isset($_POST["title"])) {$title = $_POST["title"];} 
if (isset($_POST["citation"])) {$citation = $_POST["citation"];} 
if (isset($_POST["publink"])) {  $publink = $_POST["publink"]; }


?>

<!DOCTYPE html>
<html>
<head>
    <title>Publications MS</title>
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
      <li class="nav-item">
        <a class="nav-link" href="panel_news.php">News</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="panel_publications.php">Publications<span class="sr-only">(current)</span></a>
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
            <h1>Publications Manage System</h1>
            <a href="../publications.php"><i class="fas fa-external-link-alt"></i>Go To "Publications" Page</a>
          </div>
              



          <?php 
                    if ($action=='edit') {
                        $data_query = mysqli_query($conn, "SELECT * FROM publications WHERE id='$id' ");
                        while ($row = @mysqli_fetch_array($data_query)) {
                            $title = $row["title"];
                            $citation = $row["citation"];
                            $publink = $row["publink"];
                        }

                        echo '
                        <form action="panel_publications.php" method="POST">
                          <input type="hidden" name="action" value="update">
                          <input type="hidden" name="id" value="'.$id.'">
                            
                            <div class="form-group">
                              <label>Publication Title</label>
                              <input type="text" name="title" class="form-control" value="'.$title.'">
                            </div>
                        
                            <div class="form-group">
                              <label>Citation</label>
                              <textarea type="text" name="citation" class="form-control" rows="3">'.$citation.'</textarea>
                            </div>

                            <div class="form-group">
                              <label>Publication URL</label>
                              <input type="text" name="publink" class="form-control" value="'.$publink.'">
                            </div>

                          <div class="form-group">
                            <button type="submit" name="save" class="btn btn-dark">Update Publication</button>
                          </div>
                        </form> ';
                    
                    } 
                    else if ($action=='update') 
                    {
                    

                        $update = "UPDATE publications SET
                        publications.title = '$title',
                        publications.citation = '$citation',
                        publications.publink = '$publink'
                        WHERE publications.id = '$id'
                        ";

                        if ($conn -> query($update)) {
                            echo '<div class="data-change-info">Updated!</div>';
                            
                            
                        } else {
                            echo $conn->error;
                        }

                    }
                    else if ($action=='remove') 
                    {
                        $remove = "DELETE FROM publications 
                        WHERE publications.id = '$id'
                        ";

                        if ($conn -> query($remove)) {
                            echo '<div class="data-change-info">Removed!</div>';
                            
                            
                        } else {
                            echo $conn->error;
                        }

                    }                     
                    
                    else if ($action=='save') 
                    {
                        $save = "INSERT INTO publications (title, citation,  publink) VALUES('$title', '$citation', '$publink')";

                        if ($conn -> query($save)) {                     
                            echo '<div class="data-change-info">Saved!</div>';
              
                        } else {
                            echo $conn->error;
                        } 
                    } 

                    else if ($action=='new') 
                    {
                        
                        
                        echo '
                        <form action="panel_publications.php" method="POST">
                          <input type="hidden" name="action" value="save">
                            
                            <div class="form-group">
                              <label>Publication Title</label>
                              <input type="text" name="title" class="form-control" value="">
                            </div>
                        
                            <div class="form-group">
                              <label>Citation</label>
                              <textarea type="text" name="citation" class="form-control" value="" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                              <label>Publication URL</label>
                              <input type="text" name="publink" class="form-control" value="">
                            </div>

                          <div class="form-group">
                            <button type="submit" name="save" class="btn btn-dark">Add Publication</button>
                          </div>
                        </form> ';
                    
                    } 
            ?>
        </div>
      </div>


      
    </div>

    <div class="container" id="table-new-user">
      <div class="row">
        <a href="panel_publications.php?action=new"><button class="btn btn-outline-dark">Add New Publication</button></a>            
        <?php
          tableShowPublications();
        ?>   
      </div>
    </div>
        


   
<script src="script.js"></script>  
</body>
    
<!-- Footer -->

</html>