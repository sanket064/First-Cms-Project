<?php

// this file is now going to GO and get TEMPLATE based on the request pageID
// /page.php?pageID=3

// go and get the page from the database where page id = 3
// find out what template we are using for this page
// go and get the template file as per what the database field says
// include that file
// done.
include("functions/main.php");
// if $_GET["id"] is set, then, use that value, otherways, set $_GET["id"] = some default page id
$_GET["id"] = (isset($_GET["id"]))?$_GET["id"]:7; // 1 is my default page 

$arrPageDetails = getPage($_GET["id"]);
$arrGlobals = getGlobals($_GET["id"]);
$arrLinks = getLinks();
$arrTeam = getTeam();
// go to database and get me the page I requested
// the next line means include templates/singlecolumn.php
// file_exists()
if (!file_exists("templates/".$arrPageDetails['strFileLocation']))
{

  echo "Hey, Nathan. How's your day. So... you tried to include a file from templates, but you haven't created that template yet! What you need to do, is create the file: {$arrPageDetails['strFileLocation']} and place it inside the folder templates :) Enjoy your day!";
}
if (!$arrPageDetails['strFileLocation'])
{
  echo "It appears this page does not have a file specified... perhaps you dont have a page in the pages table by id: ".$_GET["id"];
  die;
}
include("templates/".$arrPageDetails['strFileLocation']);
// or include("templates/{$arrPageDetails['strFileLocation']}");

// another query here, that would go and get my template
// SELECT * FROM TEMPLATES WHERE ID=$arrPageDetails[nTemplatesID]
?>