<?php


include("../functions/main.php"); 

doSQL("DELETE FROM team WHERE id=\"{$_GET['teamID']}\"");

header("location: ../team.php?success=true&verb=deleted")

?>