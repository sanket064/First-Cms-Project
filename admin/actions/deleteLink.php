<?php


include("../functions/main.php"); 

doSQL("DELETE FROM links WHERE id=\"{$_GET['linkID']}\"");

header("location: ../links.php?success=true&verb=deleted")

?>