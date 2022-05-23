<?php
    $servername='localhost';
	$username='u134356702_accustomercare';
	$password='Nancy3690#';
	$db = "u134356702_accustomercare";
	#connecting database
	static $conn;
	if ($conn==NULL){ 
	$conn=new mysqli($servername, $username, $password, $db); 
	}
	return $conn;
?>
