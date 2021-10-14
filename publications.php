<?php 
    include 'panel/process.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Publications</title>
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
  <a class="navbar-brand" href="#">Albert Camus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">CV</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="about.php">About Me</a>
        </li>
      <li class="nav-item active">
        <a class="nav-link" href="publications.php">Publications<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="research.php">Research</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="teaching.php">Teaching</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
  </div>
</nav>
    
<body>
    <div class="container" id="maincontainer">
        <div class="row">
            <div class="col-md" id="publications">
              <h1>Publications</h1>

              <?php 
              $query = "SELECT * FROM publications ORDER BY ID ASC";
              $result = mysqli_query($conn, $query);

              while($row = mysqli_fetch_array($result)) {
                  echo '
                  <li>
                    <a href="'.$row["publink"].'">'.$row["title"].'</a>
                  </li>
                  <p>'.$row["citation"].'</p>
                  <div class="pub-lines"></div>  ';
                }
              ?>
        </div>
    </div>
        


   
<script src="script.js"></script>  
</body>
    
<!-- Footer -->

</html>