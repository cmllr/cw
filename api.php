<?php
header("Content-Type: text/json");
$db = new DB();
$router->Route("/getpasswords/", function($php) use($db){

    $query = "Select distinct password, (Select count(id) from auth where password = a.password) as count from auth a order by count desc limit 10;";
	$stmt = $db->conn->query($query); 
	$result = $stmt->fetchAll(PDO::FETCH_CLASS);
	$got = [];
	foreach($result as $data){
		$got[] = $data;
	}
	echo json_encode($got);
});
$router->Route("/getgeoip/", function($php) use($db){

    $query = "Select distinct ip, (Select count(id) from sessions where ip = s.ip) as count from sessions s  order by count desc limit 10;";
	$stmt = $db->conn->query($query); 
	$result = $stmt->fetchAll(PDO::FETCH_CLASS);
	$got = array();
	foreach($result as $data){
		$obj = new \stdClass();
		$obj->IP = $data->ip;
		$obj->Count = $data->count;
		$geoip = file_get_contents("http://ip-api.com/json/".$data->ip);
		$geoip = json_decode($geoip);
		$obj->Latitude = $geoip->lat;
		$obj->Longitude = $geoip->lon;
		$obj->City = $geoip->city;
		$obj->Region = $geoip->regionName;
		$obj->Country = $geoip->country;
		$got[] = $obj;
	}
	echo json_encode($got);
});
$router->Route("/getinputs/", function($php) use($db){

    $query = "Select input,success from input limit 10;";
	$stmt = $db->conn->query($query); 
	$result = $stmt->fetchAll(PDO::FETCH_CLASS);
	$got = array();
	foreach($result as $data){
		$obj = new \stdClass();
		$obj->Input = $data->input;
		$obj->Success = $data->success ? "true" : "false";
		$got[] = $obj;
	}
	echo json_encode($got);
});