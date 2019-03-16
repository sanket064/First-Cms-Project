<?php


include("../functions/main.php"); 

$strLogoImage = $_POST["new_strLogoImage"];
if ($_FILES["strLogoImage"]["name"]!="")
{
  // but, if we provided a new file, then save that filename to the filename variable
  $strLogoImage = $_FILES["strLogoImage"]["name"];
  move_uploaded_file($_FILES["strLogoImage"]["tmp_name"], "../../assets/".$strLogoImage);
}


$fileName = $_POST["old_strImage"];
if ($_FILES["strImage"]["name"]!="")
{
  // but, if we provided a new file, then save that filename to the filename variable
  $fileName = $_FILES["strImage"]["name"];
  move_uploaded_file($_FILES["strImage"]["tmp_name"], "../../assets/".$fileName);
}

// do it again, for the second image
$strSubImage = $_POST["old_strSubImage"];
if ($_FILES["strSubImage"]["name"]!="")
{
  $strSubImage = $_FILES["strSubImage"]["name"];
  move_uploaded_file($_FILES["strSubImage"]["tmp_name"], "../../assets/".$strSubImage);
}




if($_POST["pageID"]!="")
{
 
  doSQL("UPDATE pages SET 
      strName=\"{$_POST["strName"]}\",
	  strMainTitle=\"{$_POST["strMainTitle"]}\",
	  strContent=\"{$_POST["strContent"]}\",
      strSubContent=\"{$_POST["strSubContent"]}\",
      strSubTitle=\"{$_POST["strSubTitle"]}\",
	  strDataFromTable=\"{$_POST["strDataFromTable"]}\",
	  strImage=\"{$fileName}\",
	  strSubImage=\"{$strSubImage}\",
      strImageAlt=\"{$_POST["strImageAlt"]}\",
	  strLogoImage=\"{$strLogoImage}\",
	  strLogoImageAlt=\"{$_POST["strLogoImageAlt"]}\",
      nTemplatesID= \"{$_POST["nTemplatesID"]}\" 
    WHERE 
      id=\"{$_POST["pageID"]}\"");

  $verb = "updated";
} else {
  // else, the page ID was blank! therefore I must be creating a page 
  doSQL("INSERT INTO pages (
      strName,
	  strMainTitle,
      strContent,
	  strSubContent,
	  strSubTitle,
      strDataFromTable,
      strImage,
	  strSubImage, 
      strImageAlt,
	  strLogoImage,
	  strLogoImageAlt,
      nTemplatesID) 
    VALUES (\"{$_POST["strName"]}\",
	\"{$_POST["strMainTitle"]}\",
    \"{$_POST["strContent"]}\",
    \"{$_POST["strSubContent"]}\",
	\"{$_POST["strSubTitle"]}\",
	\"{$_POST["strDataFromTable"]}\",
	\"{$fileName}\",
	\"{$strSubImage}\",
    \"{$_POST["strImageAlt"]}\",
	\"{$strLogoImage}\",
	\"{$_POST["strLogoImageAlt"]}\",
    \"{$_POST["nTemplatesID"]}\")");
  $verb = "created";
 
}
 header("location: ../pages.php?success=true&verb=$verb");


?>