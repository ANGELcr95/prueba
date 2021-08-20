<?php
$server = 'localhost'; 
$username = 'root';
$password = '';
$database = 'php_login_database'; 

try {
  
    $conn2 = new PDO("mysql:host=$server;dbname=$database;",$username,$password); 
} catch (PDOException $e_) { 
  
  die('Connected failed: '.$e->getMessage());
}
?>
