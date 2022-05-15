<?php

	interface formForConnecting
	{
		public function connect($mysqli);
	}

	class connectToDBWhenBuyGoodsNumberOne implements formForConnecting
	{
		public function connect($mysqli)
		{
			if(isset($_GET['p1']))
			{
				$name = $_GET['name'];
				$email = $_GET['email'];
				$amount = 20;
				//$mysqli = new mysqli('localhost', 'root', '', 'users');

				$name = '"'.$mysqli->real_escape_string("$name").'"';
				$email = '"'.$mysqli->real_escape_string("$email").'"';
				$amount = '"'.$mysqli->real_escape_string("$amount").'"';

				$result = $mysqli->query("INSERT INTO `bonus_system`(ФИО, EMAIL, Количество_бонусов) VALUES($name, $email, $amount)");
				if($result)
				{
					header("location: http://localhost/");
					exit();
				}
				$mysqli->close();
			}
		}
	}


	class connectToDBWhenBuyGoodsNumberTwo implements formForConnecting
	{
		public function connect($mysqli)
		{
			if(isset($_GET['p2']))
			{
				$name = $_GET['name'];
				$email = $_GET['email'];
				$amount = 10;
				//$mysqli = new mysqli('localhost', 'root', '', 'users');

				$name = '"'.$mysqli->real_escape_string("$name").'"';
				$email = '"'.$mysqli->real_escape_string("$email").'"';
				$amount = '"'.$mysqli->real_escape_string("$amount").'"';

				$result = $mysqli->query("INSERT INTO `bonus_system`(ФИО, EMAIL, Количество_бонусов) VALUES($name, $email, $amount)");
				if($result)
				{
					header("location: http://localhost/");
					exit();
				}
				$mysqli->close();
			}
		}
	}


	class resultConnectWithDB
	{
		public function result(formForConnecting $result, $mysqli)
		{
			$result->connect($mysqli);
		}
	}

	$mysqli = new mysqli('localhost', 'root', '', 'users');

	$resultOne = new resultConnectWithDB();
	$resultOne->result(new connectToDBWhenBuyGoodsNumberOne(), $mysqli);

	$resultTwo = new resultConnectWithDB();
	$resultTwo->result(new connectToDBWhenBuyGoodsNumberTwo(), $mysqli);


	class showUserBonuses
		{
			
			function __construct()
			{
				if(isset($_GET["btn"]))
				{
					$email = $_GET['email'];
					$mysqli = new mysqli('localhost', 'root', '', 'users');
					$email = '"'.$mysqli->real_escape_string("$email").'"';
					$result = $mysqli->query("SELECT Email,SUM(Количество_бонусов) FROM `bonus_system` WHERE Email = $email GROUP BY Email");
					$row = $result->fetch_assoc();
					if($row)
					{
						echo "Количеcтво ваших бонусов: ".$row['SUM(Количество_бонусов)'];
						exit();
					}
					$mysqli->close();
				}
			}
		}	

?>