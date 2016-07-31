<?php
	header("Content-Type: text/json");
	$router->Route("/getpasswords/", function($php){

        $db = new DB();
        $query = "Select * from auth";
		$stmt = $db->conn->query($query);
		$result = $stmt->fetchAll(PDO::FETCH_CLASS);
		var_dump($result);
    });