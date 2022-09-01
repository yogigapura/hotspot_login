<?php
require("routeros_api.class.php");
$API = new routeros_api();
$API->debug = false;
$username_mikrotik  = "API";
$password_mikrotik  = "Api123!";
$iphost_mikrotik    = "192.168.99.253";
//$iphost_mikrotik    = "172.16.1.10";

if($API->connect($iphost_mikrotik, $username_mikrotik, $password_mikrotik)){
$username 	= $_POST['username'];
$email		= $_post['email'];
$password 	= $_POST['password'];
$nomor		= $_POST['nomor'];
$mac	  	= $_POST['mac'];
	try {
	$cekuser = $API->comm('/ip/hotspot/user/print',array(
			"name"     => $username,
			));
	if(count($cekuser)>0){
		echo "<script>window.location='http://192.168.99.253/hotspot-login/gagal.html'</script>";
	}else{
    $API->comm("/ip/hotspot/user/add", array(
			"server"		=> "all",
			"profile"		=> "tamu",
			"name"     		=> $username,
			"email"			=> $address,
			"password"		=> $password,
			"comment"		=> $nomor,
			"mac-address"	=> $mac,		
			"limit-uptime"	=> "00:30:00",
			));
    echo "<script>window.location='http://192.168.99.253/hotspot-login/login?username=".$username."&password=".$password."'</script>";
		}
		$API->disconnect();
	} 
	catch (Exception $ex) {
	echo "Caught exception from router: " . $ex->getMessage() . "\n";
	}	
 
} else {
  echo " Router Not Connected";
  }
?>