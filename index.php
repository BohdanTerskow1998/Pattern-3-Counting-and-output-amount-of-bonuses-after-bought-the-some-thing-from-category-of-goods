<?php require 'connectWithDB.php' ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Показ количества бонусов после покупки определенного товара</title>
	<style type="text/css">
		input
		{
			margin-top: 5px;
		}
	</style>
</head>
<body>


	<form method="GET">
		<input type="text" name="name" placeholder="Терсков Богдан Сергеевич" size="25"> <br />
		<input type="text" name="email" placeholder="bohdanterskow@gmail.com" size="25"> <br /> <br />

		<input type="submit" name="p1" value="Купить товар №1"> <br />
		<input type="submit" name="p2" value="Купить товар №2">
	</form>

<br />

	<form method="GET">
		<label>Проверить количество бонусов: <br /> ваш email:</label>	
		<input type="text" name="email" placeholder="bohdanterskow@gmail.com" size="25"><br />
		<input type="submit" name="btn" id="btn">
	</form>

	<?php $showBonuses = new showUserBonuses(); ?>


</body>
</html>