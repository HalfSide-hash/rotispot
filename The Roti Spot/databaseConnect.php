<?php

$dsn = 'mysql:host=localhost;dbname=novasg1_rotispot';
$username = 'novasg1';
$password = 'Montclair123';

try
{
	$db = new PDO($dsn, $username, $password);
}
catch (PDOException $e)
{
	$error_message = $e->getMessage();
	echo '<h1>Not connected to database </h1>
		';
	exit();
}

?>