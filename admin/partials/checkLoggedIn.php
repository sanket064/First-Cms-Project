<?php

include("functions/main.php"); // because we are inside the actions folder, we need ../ to go up and out of this directory

session_start();

//mysqli_fetch_assoc <------- that gets me ONE record, or the first record from the result object//
$results = mysqli_fetch_assoc(getRecords("SELECT * FROM users WHERE id=\"{$_SESSION["userID"]}\""));

if (!isset($results['id']))
{
  header("location: index.php?error=true");
}

?>