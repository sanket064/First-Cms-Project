<?php
include("../functions/main.php"); // because we are inside the actions folder, we need ../ to go up and out of this directory

session_start();

/// this file needs to log me in. 

// check if $_POST["strEmail"], and $_POST["strPassword"] are valid

// if valid, then save our user ID to the session

//mysqli_fetch_assoc <------- that gets me ONE record, or the first record from the result object//
$results = mysqli_fetch_assoc(getRecords("SELECT * FROM users WHERE strEmail=\"{$_POST["strEmail"]}\" AND strPassword=\"{$_POST["strPassword"]}\""));

if (isset($results['id']))
{
  $_SESSION["userID"] = $results['id'];
  header("location: ../dashboard.php"); // because we are inside the actions folder, we need ../ to go up and out of this directory
} else {
  header("location: ../index.php?error=true");
}

?>