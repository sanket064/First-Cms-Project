<?php


include("../functions/main.php"); 

// if, the pageID has a value, then update that page
// $_FILES
// $_POST["old_strImage"]

// set the filename to whatever the old file was
$strContactImage = $_POST["old_strContactImage"];
if ($_FILES["strContactImage"]["name"]!="")
{
  // but, if we provided a new file, then save that filename to the filename variable
  $strContactImage = $_FILES["strContactImage"]["name"];
  move_uploaded_file($_FILES["strContactImage"]["tmp_name"], "../../assets/".$strContactImage);
}





if($_POST["teamID"]!="")
{
 
  doSQL("UPDATE pages SET 
      strName=\"{$_POST["strName"]}\",
    strContactImage=\"{$strContactImage}\",
      strContactImageAlt=\"{$_POST["strContactImageAlt"]}\",
     strDescription=\"{$_POST["strDescription"]}\",
      nTemplatesID= \"{$_POST["nTemplatesID"]}\" 
    WHERE 
      id=\"{$_POST["teamID"]}\"");

  $verb = "updated";
} else {
  // else, the page ID was blank! therefore I must be creating a page 
  doSQL("INSERT INTO team (
      strName, 
      strContactImage,
    strContactImageAlt,
      strDescription) 
    VALUES (\"{$_POST["strName"]}\",
    \"{$strContactImage}\",
  \"{$_POST["strContactImageAlt"]}\",
    \"{$_POST["strDescription"]}\")");
  $verb = "created";
 
}
 header("location: ../team.php?success=true&verb=$verb");


?>