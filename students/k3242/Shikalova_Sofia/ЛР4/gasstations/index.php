<!DOCTYPE html>
   <head>
<title>Insert data to PostgreSQL with php</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>


<h3>Зарегестрировать клиента.</h3>
<form name="insert" action="insert.php" method="POST" >
Код клиента<br>
<input type="text" name="Code1"/><br>
Имя клиента<br>
<input type="text" name="Name"/><br>
Эл. почта клиента<br>
<input type="text" name="Email"/><br>
Телефон клиента<br>
<input type="text" name="Telephone1"/><br>
<input type="submit"/>
<br>
</form>

<hr>

<h3>Вывести информацию о клиенте.</h3>
<form name="select" action="select.php" method="POST" >
Код клиента<br>
<input type="text" name="Code2"/><br>
<input type="submit"/>
<br>
</form>

<hr>

<h3>Обновить телефон клиента.</h3>
<form name="update" action="update.php" method="POST" >
Код клиента<br>
<input type="text" name="Code3"/><br>
Телефон клиента<br>
<input type="text" name="Telephone2"/><br>
<input type="submit"/>
<br>
</form>

<hr>

<h3>Удалить запись о продаже.</h3>
<form name="delete" action="delete.php" method="POST" >
Код транзакции<br>
<input type="text" name="Code4"/><br>
<input type="submit"/>
<br>
</form>

</body>
</html>