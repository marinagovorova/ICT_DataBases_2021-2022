<!DOCTYPE html>
   <head>
<title>Insert data to PostgreSQL with php</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {listt-style: none;}
</style>
   </head>
   <body>


<h3>Введите город, который вы хотите добавить.</h3>
  <form name="insert" action="insert.php" method="POST" >
Название города<br>
<input type="text" name="Name"/><br>
<input type="submit"/>
<br>
</form>

<hr>


<h3>Введите отель, который вы хотите добавить, а также город в который вы хотите его добавить.</h3>
<form name="insert" action="insert_hotel.php" method="POST">
Название отеля<br>
<input type="text" name="name1"/><br>
ID города<br>
<input type="text" name="city"/><br>
Адресс<br>
<input type="text" name="adress"/><br>
<input type="submit"/>
</form>

<hr>

<h3>Введите отель, который вы хотите удалить</h3>
<form name="delete_hotel" action="delete_hotel.php" method="POST">
Название отеля<br>
<input type="text" name="name2"/>
<br>
<input type="submit"/>
</form>

<hr>


<h3>Обновить адресс отеля</h3>
<form name="update_hotel" action="update_hotel.php" method="POST">
<br> 
Введите id отеля
<br>
<input type="text" name="hotel_id"/>
<br>
Ввведите новый адресс
<br>
<input type="text" name="adress1"/>
<br>
<input type="submit"/>
</form>

<hr>



<h3>Нажмите, чтобы вевести кол-во всех отелей в сети</h3>
<form name="select_hotel" action="select_hotel.php" method="POST">
<input type="submit"/>
</form>


</body>
</html>
