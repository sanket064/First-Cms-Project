<?php


include("../functions/main.php"); 

// if, the pageID has a value, then update that page
if($_POST["linkID"]!="")
{
 
  doSQL("UPDATE links SET 
      strName=\"{$_POST["strName"]}\",
      nLocationsID=\"{$_POST["nLocationsID"]}\",
      nPagesID=\"{$_POST["nPagesID"]}\"
    WHERE 
      id=\"{$_POST["linkID"]}\"");

  $verb = "updated";
} else {
  // else, the page ID was blank! therefore I must be creating a page 
  doSQL("INSERT INTO links (
      strName, 
      nLocationsID,
      nPagesID) 
    VALUES (\"{$_POST["strName"]}\",
    \"{$_POST["nLocationsID"]}\",
    \"{$_POST["nPagesID"]}\")");
  $verb = "created";
 
}
 header("location: ../links.php?success=true&verb=$verb");


?>