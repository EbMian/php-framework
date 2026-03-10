<?php

$db_debug = false; // mettre a false pour arreter le debug

// minilib MySQL
function my_query($query)
{
	global $link;
	global $db_debug;
	mysqli_report(MYSQLI_REPORT_OFF);

	if ($db_debug)
		echo $query.'<br>';

	if (empty($link))
		$link = @mysqli_connect('localhost', 'root', 'root', 'cinema');

	if (!$link)
		die("Failed to connect to MySQL: " . mysqli_connect_error());

	$result = @mysqli_query($link, $query);
	if (!$result)
		die("Failed to execute MySQL query: " . mysqli_error($link));

	return $result;
}

function my_fetch_array($query)
{
	$result = my_query($query);
	$data = [];

	while ($line = mysqli_fetch_assoc($result))
		$data[] = $line;

	return $data;
}

function my_insert_id()
{
	global $link;
	$pk_val = mysqli_insert_id($link);
	return $pk_val;
}