<?php
$dbuser = 'postgres';
$dbpass = '6hgkx277v';
$host = '127.0.0.1';
$dbname='gas\ stations';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

$result = $db->query("INSERT INTO public.Клиент(client_code, client_name, client_email, client_telephone)
	VALUES ('$_POST[Code1]', '$_POST[Name]', '$_POST[Email]', '$_POST[Telephone1]')");
while ($row = $result->fetch()){
	echo '<pre>';
	print_r($row);
}
echo "Action succeed";

?>
