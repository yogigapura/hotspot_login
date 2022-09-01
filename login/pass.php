<?php
require("routeros_api.class.php");
$API = new routeros_api();
$API->debug = false;
$user_mikrotik  = "API";
$password_mikrotik  = "Api123!";
$ip_mikrotik    = "192.168.99.253";
//$ip_mikrotik    = "172.16.1.10";

if($API->connect($ip_mikrotik, $user_mikrotik, $password_mikrotik)){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $API->comm("/ip/hotspot/user/set", array(	 
          ".id"     		=> $username,
          "password"	 	=> $password,
  
			));
 echo "<script>window.location='http://192.168.99.253/hotspot-login/sukses.html'</script>";
} else {
  echo "Mikrotik tidak terhubung";
  }
?>