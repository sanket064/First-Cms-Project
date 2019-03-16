<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Global Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid center">
  <div class="row">
          <div class="col-xl-12 col-md-12 positioning-a">
      <a href="pages.php" class="btn btn-primary">Pages</a>
      <a href="links.php" class="btn btn-primary">Links</a>
      <a href="globals.php" class="btn btn-primary">Site Wide Values</a>
      <a href="team.php" class="btn btn-primary">Team page</a>
      </div>
  </div>
</div>
<div class="container top">
  <div class="row">
    
    <div class="col-xl-12">
        <div class="center margin-top  image ">
        <img src="imgs/pic2.png" alt="Norwal"/>
      <h1>Here Are All Your Global Values</h1>
      <p>What would you like to do?</p>

      <?php
      if (isset($_GET["success"]))
      {
        ?>
        <p class="msg success">We <?=ucfirst($_GET["verb"])?> Your Global Value Successfully</p>
        <?php
      }?>
    
    
      <div class="action">
        <a href="globalForm.php" class="btn btn-success margin-bottom"><i class="fas fa-plus-circle"></i> Add Global</a>
      </div>
      </div>
      <div class="margin-less">
      <div class="recordRowHeader">
        <div class="recordCell name">Name</div>
        <div class="recordCell edit">Edit</div>
        <div class="recordCell delete">Delete</div>
      </div>

     
      <?php
      $arrRecords =getRecords("SELECT * FROM globals");
      while($row = mysqli_fetch_assoc($arrRecords))
      {
        echo "<div class=\"recordRow\">
                <div class=\"recordCell name\">{$row["strName"]}</div>
                <div class=\"recordCell edit\"><a href=\"globalForm.php?globalID={$row["id"]}\"><i class=\"fas fa-pencil-alt\"></i></a></div>
                <div class=\"recordCell delete\"><a href=\"actions/deleteGlobal.php?globalID={$row["id"]}\"><i class=\"fas fa-trash-alt\"></i></a></div>
              </div>";

      }
      ?>
    </div>

  </div>
</div>
</div>

</body>
</html>