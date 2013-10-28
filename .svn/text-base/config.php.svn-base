<?php
//connection to db, these should be in a config.php file
include("secure/database.php");
$conn = pg_connect(HOST." ".DBNAME." ".USERNAME." ".PASSWORD);
if(!$conn) {
		echo "<p>Failed to connect to DB</p>";
		exit();
}
?>