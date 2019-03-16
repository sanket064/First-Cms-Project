<?php
function dbConnect()
{
  $con = mysqli_connect("192.185.103.167", "sanket06_sk", "welcome02", "sanket06_donate" ); // WAMP
  //mysqli_connect(host, user, pass, dbname)

  if (!$con)
  {
    die("Connection failed: " . mysqli_connect_error());
  }

  return $con;
}
function getPage($pageID)
{
  if (!$pageID)
  {
    echo "Hey... so, for some reason, you didn't pass a page ID into the getPage function... perhaps your URL is not formed correctly, check the URL in the browser and make sure you ...";
  }
   $con = dbConnect();

  //$sql = "SELECT * FROM pages WHERE id='{$pageID}'";
  // SELECT pages.* // this says get all fields from the table pages
  // SELECT pages.*, templates.strFileLocation FROM pages LEFT JOIN templates ON templates.id=pages.nTemplatesID WHERE pages.id='{$pageID}'

  $sql = "SELECT pages.*, templates.strFileLocation FROM pages LEFT JOIN templates ON templates.id=pages.nTemplatesID WHERE pages.id='{$pageID}'";

  //mysqli_fetch_assoc ( ..... ) gets me the first record.. or only record
  $arrPage = mysqli_fetch_assoc(mysqli_query($con, $sql)); 

  return $arrPage;

}

function getLinks($locationID)
{

  // open a connection to db
   $con = dbConnect();

  $sql = "SELECT id, strName, nPagesID FROM links WHERE nLocationsID='{$locationID}'";

  $result = mysqli_query($con, $sql); // returns a result OBJECT mysqli_query

  while($row = mysqli_fetch_assoc($result))
  {
    echo "<li><a href=\"index.php?id={$row['nPagesID']}\">{$row['strName']}</a></li>"; // the variable inside {} means show my variable
  }
}
function getNavLinks($type)
{

  // open a connection to db
  $con = dbConnect();
	
  $sql = "SELECT id, strName, nPagesID FROM links WHERE nLocationsID='{$type}'";

  $result = mysqli_query($con, $sql); // returns a result OBJECT mysqli_query

  while($row = mysqli_fetch_assoc($result))
  {
    if ($type=="li")
    {
    echo "<li><a href=\"index.php?id={$row['nPagesID']}\">{$row['strName']}</a></li>"; // the variable inside {} means show my variable
   } else {
    echo "<a href=\"index.php?id={$row['nPagesID']}\">{$row['strName']}</a>";
    }
  }
}

function getDataFromTable($table)
{

  // open a connection to db
   $con = dbConnect();

  $sql = "SELECT * FROM $table"; // dynamically select all records from a table

  $result = mysqli_query($con, $sql); // returns a result OBJECT mysqli_query

  return $result; // this is a result object, WITH ALL THE ROWS INSIDE... 
}

function showDataGrid($table,$whichSnippetFile)
{
  ////////////

  // go to the function in my main.php file
  // return a result object with all records from my query
  $result = getDataFromTable($table);

  // loop over each of the results records
  while($row = mysqli_fetch_assoc($result))
  {
    // output what is contained in the specific $row
   include("snippets/".$whichSnippetFile);
  }

}

// this takes an array ($record), and then which field we want from the array and checks if the key actually exists in the array. If if it does exist, then echo it to the browser! WHY: because when we ask for a key from an array that does not exist, it will give an undefined variable. 
function conDisplay($record, $field)
{
   if (isset($record[$field])){
    echo $record[$field];
  }
}

function getRecords($sql)
{
  $con = dbConnect();
  $result = mysqli_query($con, $sql); // returns a result OBJECT mysqli_query
  return $result; // this is a result object, WITH ALL THE ROWS INSIDE... 
}
function getLink($id)
{
  $con = dbConnect();
  $result = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM links WHERE id='".$id."'")); // returns a result OBJECT mysqli_query JUST return the first record

  return $result; // this is a result object, WITH ALL THE ROWS INSIDE... 
}
function getTeam($id)
{
  $con = dbConnect();
  $result = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM team WHERE id='".$id."'")); // returns a result OBJECT mysqli_query JUST return the first record

  return $result; // this is a result object, WITH ALL THE ROWS INSIDE... 
}
function doSQL($sql)
{
  $con = dbConnect();
  mysqli_query($con, $sql); // returns a result OBJECT mysqli_query
}


  

?>