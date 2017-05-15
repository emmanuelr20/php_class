<?php
	require 'querybuilder.php';
	require 'connection.php';

	$pdo = Connection::make();
	$db_query = new QueryBuilder($pdo);
	$tasks = $db_query->find('todos', 3);
	//$tasks = $db_query->where('todos', 'description', 'eat food');
	$arr = ['description'=>'fish for catfish', 'completed'=>'1'];
	$db_query->update('todos', $arr, 1);
	//$db_query->delete('todos', 2);
	var_dump($tasks);
	require 'indexView.php';
?>