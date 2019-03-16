<?php
include("partials/checkLoggedIn.php");
?>
<!DOCTYPE html>
<html>
<head>
<head>
    <title>Adding A Page</title>
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
      if(isset($_GET["pageID"])){
          // i must be editing page....
        $verb = "Editing";
        $arrPage = getPage($_GET["pageID"]);

        if (!$arrPage)
        {
          echo "hey... no page with that ID";
          die;
        }
      } else{
        $_GET["pageID"] = false;
      }
      $arrPage = (isset($arrPage))?$arrPage:false;
      ?>
      <h1 class="center"><?=$verb?> A Page</h1>

      <form method="post" action="actions/savePage.php" enctype="multipart/form-data">
        <input type="hidden" name="pageID" value="<?=$_GET["pageID"]?>">
        Page Name:
        <input type="text" name="strName" value="<?=$arrPage['strName']?>" placeholder="Enter Page Name"><br/>
        Main Title:
        <textarea name="strMainTitle"><?=$arrPage['strMainTitle']?></textarea><br>
        Content:
        <textarea name="strContent"><?=$arrPage['strContent']?></textarea><br>
        Sub Content:
        <textarea name="strSubContent"><?=$arrPage['strSubContent']?></textarea><br>
        Sub Title:
        <textarea name="strSubTitle"><?=$arrPage['strSubTitle']?></textarea><br>
        Sub Last Content:
        <textarea name="strDataFromTable"><?=$arrPage['strDataFromTable']?></textarea><br>
		  
        <select name="nTemplatesID">
            <option>Select Template</option>
             <?php
             //$arrPage[nTemplatesID] <----- that is the id of the template....
              $arrTemplates =getRecords("SELECT * FROM templates");
              while($row = mysqli_fetch_assoc($arrTemplates))
              {
                $isSelected = ($arrPage["nTemplatesID"] == $row["id"])?"SELECTED":"";
                echo "<option value=\"{$row["id"]}\" $isSelected >{$row["strName"]}</option>";

              }
              ?>
        </select>
       <br/>
		  Logo Image<br/>
		  <img src="../assets/<?=$arrPage['strLogoImage']?>" width="100"><br/>
		  <input type="hidden" name="new_strLogoImage" value="<?=$arrPage['strLogoImage']?>">
		  <input type="file" name="strLogoImage"><br/>
		  
         Logo Image Alt Text

        <input type="text" name="strLogoImageAlt" value="<?=$arrPage['strLogoImageAlt']?>" placeholder="Logo Image Alt Tag"><br/>
		  
		  
        Hero Image<br/>
        <img src="../assets/<?=$arrPage['strImage']?>" width=100><br/>
        <input type="hidden" name="old_strImage" value="<?=$arrPage['strImage']?>">
        <input type="file" name="strImage"><br/>

        Sub Image<br/>
        <img src="../assets/<?=$arrPage['strSubImage']?>" width=100><br/>
        <input type="hidden" name="old_strSubImage" value="<?=$arrPage['strSubImage']?>">
      
        <input type="file" name="strSubImage"><br/>

        Image Alt Text

        <input type="text" name="strImageAlt" value="<?=$arrPage['strImageAlt']?>" placeholder="Sub Image Alt Tag"><br/>



        <input type="submit" value="SAVE PAGE">
		  

      </form>
      </article>
    </div>
     

  </div>
</div>

</body>
</html>