<?php
function dbConnect()
{
  $con = mysqli_connect("192.185.103.167", "sanket06_sk", "welcome02", "sanket06_donate" ); // WAMP
  //mysqli_connect(host, user, pass, dbname)
  //$con = mysqli_connect("localhost", "kaiming_goatuser", "w3lnwf0S6rO1", "kaiming_goat" ); // these are for live cpanel server CPANEL

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

function getNavLinks($locationID, $type)
{

  // open a connection to db
  $con = dbConnect();

  $sql = "SELECT id, strName, nPagesID FROM links WHERE nLocationsID='{$locationID}'";

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

function getGlobals()
{
  $con = dbConnect();
  $result = mysqli_query($con, "SELECT * FROM globals"); // returns a result
  while($row = mysqli_fetch_assoc($result))
  {
    // output what is contained in the specific $row
    // 
    //

    /*
    myArray[address] = "123 Sesame Street";
    myArray[contactemail] = "me@me.com";
    */
   $myArray[$row["strName"]] = $row["strValue"];
  }
   return $myArray; // this is a result object, WITH ALL THE ROWS INSIDE... 
}
  function getLinks()
{
  $con = dbConnect();
  $result = mysqli_query($con, "SELECT * FROM links"); // returns a result
  while($row = mysqli_fetch_assoc($result))
  {
    
   $myArray[$row["strName"]] = $row["nLocationsID"] = $row["nPagesID"];
  }
   return $myArray; // this is a result object, WITH ALL THE ROWS INSIDE... 
}  
function getTeam()
{
 $con = dbConnect();
 $sql = "SELECT * FROM team ORDER BY strName";
 $result = mysqli_query($con, $sql);
 $teamHTML="";

 while($row = mysqli_fetch_assoc($result))
 {
  $teamHTML .= "
  <div class='gallery'>
  <img src='assets/".$row['strContactImage']."' alt='".$row['strContactImageAlt']."'>
  <div class='desc'>
  ".$row['strName']."</div>
  <p>".$row['strDescription']."</p></div>";
 }
  return $teamHTML; // this is a result object, WITH ALL THE ROWS INSIDE...
}
?>