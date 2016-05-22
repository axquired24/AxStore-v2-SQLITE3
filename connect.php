<?php
//connect.php
	class MyDB extends SQLite3 {
		var $dbName;

		function __construct($dbName){
			$this->open($dbName);
		}
	}

	$db = new MyDB('northwind.sl3');
	if(!$db) {
		echo $db->lastErrotMsg();		
	}

?>