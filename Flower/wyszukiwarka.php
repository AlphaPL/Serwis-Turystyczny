<?php

function wyszukaj($title, $author, $grade_from, $grade_to, $difficulty_from, $difficulty_to, $budget_from, $budget_to, $country, $db)
{
	$sql = "SELECT * FROM TRIPS WHERE ID >= 0";

	if ($title != '')
		$sql .= " AND TITLE=%title%";
	if ($author != '')
		$sql .= " AND AUTHOR=%author%";
		
	if ($grade_from != '')
		$sql .= " AND GRADE>=%grade_from%";
	if ($grade_to != '')
		$sql .= " AND GRADE<=%grade_to%";
	if ($difficulty_from != '')
		$sql .= " AND DIFFICULTY>=%difficulty_from%";
	if ($difficulty_to != '')
		$sql .= " AND DIFFICULTY<=%difficulty_to%";
	if ($budget_from != '')
		$sql .= " AND BUDGET>=%budget_from%";
	if ($budget_to != '')
		$sql .= " AND BUDGET<=%budget_to%";

	if ($country != '')
		$sql .= " AND COUNTRY=%country%";
		
	$sql .= ";";
	
	$ret = $db->query($sql);
 
	return $ret;
 }

?>