<?php
class Database
{
 public static $conn = null;
 public static function getConnection()
 {
  if (Database::$conn == null) {
   //try {
   $servername = "mysql.selfmade.ninja";
   $username = "Klinton_03";
   $password = "Klinton@432305";
   $dbname =  "Klinton_03_apple";

   // Create connection
   $connection = new mysqli($servername, $username, $password, $dbname);
   // Check Connection
   if ($connection->connect_error) {
    die("Connecton Failed: " . $connection->connect_error);
   } else {
    //print("New connection Establishing...");
    Database::$conn = $connection; // Replacing null with actual connection
    return Database::$conn;
   }
   // } catch (Exception $e) {
   //          echo 'Caught exception: ', $e->getMessage(), "\n";
   // }
  } else {
   //return print("Returning Existing Establishing...");
   return Database::$conn;
  }
 }
}
