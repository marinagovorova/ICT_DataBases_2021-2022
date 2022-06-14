<! DOCTYPE html>
<head>
<title>Insert data</title>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8" />
<style>
li {list-style: none;}
</style>
</head>
<body>
<h2>Добавление нового ментора </h2>
<ul>
<form name="insert" action="index.php" method="GET" >
<li>*Введите ID ментора:</li><li><input type="text" name="mentor_id" /></li>
<li>*Введите фамилию ментора в формате 'Фамилия' (с кавычками):</li><li><input type="text" name="surname" /></li>
<li>*Введите имя ментора в формате 'Имя' (с кавычками):</li><li><input type="text" name="name" /></li>
<li>Введите отчество ментора в формате 'Отчество' (с кавычками):</li><li><input type="text" name="secondname" /></li>
<li>Введите дату рождения в формате 'ГГГГ-ММ-ДД' (с кавычками):</li><li><input type="text" name="birthdate" /></li>
<li>Введите название компании ментора в формате 'Компания' (с кавычками):</li><li><input type="text" name="company" /></li>
<li><input type="submit" name="submit" /></li>
</form>
</ul>
</body>
</html>



