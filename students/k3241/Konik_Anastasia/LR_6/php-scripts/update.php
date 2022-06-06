<?php
$dbuser = 'postgres';
$dbpass = 'qwertyhgfdsa1';
$host = 'localhost';
$dbname = 'JobAccounting';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if (!(isset($_POST["form_display"]) || isset($_POST["form_update"]))) {
	echo "Error";
}

$result;

if (isset($_POST["form_display"])) {
	$result = pg_query($db, "SELECT * FROM students WHERE id = $_POST[id]");	
}
if (isset($_POST["form_update"])) {
	$result = pg_query($db, "UPDATE students SET class = '$_POST[class_updated]' WHERE id = $_POST[id_updated]");
}

if (isset($_POST["form_display"])) {
	$row = pg_fetch_assoc($result);
	if ($row == NULL) {
		echo "ERROR: No such id";
	} else {	
		echo "<ul>
				<form name='update' action='update.php' method='POST' >
				<li>ID:</li><li><input type='text'     name='id_updated' value='$row[id]'/></li>
				<li>Name:</li><li><input type='text' name='name_updated' value='$row[name]'/></li>
				<li>Surname:</li><li><input type='text' name='surname_updated' value='$row[surname]'/></li>
				<li>Class:</li><li><input type='text' name='class_updated' value='$row[class]'/></li>
				<li><input type='hidden' name='form_update' value=''/></li>
				<li><input type='submit'/></li>  </form>
			</ul>";
	}
}

if (isset($_POST["form_update"])) {
	if (!$result) {
		echo "ERROR: Update failed!";
	} else {
		echo "Updated successfully";
	}
}
?>