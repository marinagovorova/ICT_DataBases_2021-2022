<!DOCTYPE html>
<head>
<title>Update data</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {list-style: none;}
</style>
</head>
<body>
<h2>Просмотр информации о менторе, компанию которого мы хотим изменить.</h2>
<ul>
<form name="display" action="index.php" method="GET" >
<li>Введите id ментора:</li><li><input type="text" name="mentor_id" /></li>
<li><input type="submit" name="mentor" /></li>
</form>
</ul>
<h2>Изменение компании найденного ментора</h2>
<ul>
<form name="display" action="index.php" method="GET" >
<li>Введите id ментора:</li><li><input type="text" name="mentor_id" /></li>
<li>Введите новую компанию ментора в формате 'Компания' (с кавычками):</li><li><input type="text" name="company"/></li>
<li><input type="submit" name="mentor_company" /></li>
</form>
<ul>
</body>
</html>



