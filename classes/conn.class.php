<?php
 class Conn{
    
    protected function connect(){
      $host = 'localhost'; // e.g., localhost
      $db = 'api_project'; // e.g., mydatabase
      $user = 'apiProject'; // e.g., myusername
      $pass = '148.'; // e.g., mypassword
      $port = '5432'; // default is 5432
      
      try {
          // Create a new PDO instance
          $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
          $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      
          echo "Connected to the PostgreSQL database successfully!";
      } catch (PDOException $e) {
          echo $e->getMessage();
      }
      
    }
        
 }