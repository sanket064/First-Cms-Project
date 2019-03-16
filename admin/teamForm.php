<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
 <title>Adding A Team Member</title>
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
      <article>
        <div class="center margin-top  image ">
        <img src="imgs/pic2.png" alt="Norwal"/>
        </div>
   
      <?php
      $verb = "Adding";
      if(isset($_GET["teamID"])){
          // i must be editing page....
        $verb = "Adding";
        $arrTeam = getTeam($_GET["teamID"]);

        if (!$arrTeam)
        {
          echo "hey... no page with that ID";
          die;
        }
      } else {
        
        // i know then that $_GET["pageID"] = ""; was not set
        $_GET["teamID"] = "";
        $arrTeam['strName']= "";
        $arrTeam['strContactImage']= "";
		$arrTeam['strContactImageAlt']= "";
        $arrTeam['strDescription']= "";
      }

      ?>
      <h1 class="center"><?=$verb?> A Team Member</h1>

      <form method="post" action="actions/saveTeam.php" enctype="multipart/form-data">
        <input type="hidden" name="teamID" value="<?=$_GET["teamID"]?>">
        <h3>Member Name</h3>
        <input type="text" name="strName" value="<?=$arrTeam['strName']?>" placeholder="Enter Member Name"><br/>
        <h3>Member Description</h3>
        <textarea name="strDescription"><?=$arrTeam['strDescription']?></textarea><br>

<br/>
       <h3>Member Image</h3>
        <img src="../assets/<?=$arrTeam['strContactImage']?>" width=100><br/>
        <input type="hidden" name="old_strContactImage" value="<?=$arrTeam['strContactImage']?>">
        <input type="file" name="strContactImage"><br/>
		  
		   Contact Image Alt Text

        <input type="text" name="strContactImageAlt" value="<?=$arrTeam['strContactImageAlt']?>" placeholder="Contact Image Alt Tag"><br/>
		  
         <input type="submit" value="SAVE Team Member">
      </form>
      
    </article>
     

  </div>
</div>
</div>

</body>
</html>