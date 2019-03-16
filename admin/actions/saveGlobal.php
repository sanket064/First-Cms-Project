<?php


include("../functions/main.php"); 

// if, the pageID has a value, then update that page
if($_POST["globalID"]!="")
{
 
  doSQL("UPDATE globals SET 
      strName=\"{$_POST["strName"]}\",
      strValue=\"{$_POST["strValue"]}\"
    WHERE 
      id=\"{$_POST["globalID"]}\"");

  $verb = "updated";
} else {
  // else, the page ID was blank! therefore I must be creating a page 
  doSQL("INSERT INTO globals (
      strName, 
      strValue) 
    VALUES (\"{$_POST["strName"]}\",
    \"{$_POST["strValue"]}\")");
  $verb = "created";
 
}
 header("location: ../globals.php?success=true&verb=$verb");


?>