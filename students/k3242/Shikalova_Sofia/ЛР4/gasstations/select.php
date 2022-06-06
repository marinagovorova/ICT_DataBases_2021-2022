<?php
$dbuser = 'postgres';
$dbpass = '6hgkx277v';
$host = 'localhost';
$dbname='gas\ stations';
$db = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
		
$result = $db->query("SELECT * FROM public.Клиент WHERE client_code = '$_POST[Code2]'");
while ($row = $result->fetch()){
	echo 'Идентификатор клиента: '.$row['client_code']."<br />";
	echo 'Имя клиента: '.$row['client_name']."<br />";
	echo 'Почта клиента: '.$row['client_email']."<br />";
	echo 'Телефон клиента: '.$row['client_telephone']."<br />";
}
if (!$result){
	echo "Action failed!!";
} else {
	echo "";
};


?> 