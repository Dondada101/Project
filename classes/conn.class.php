<?php
class Conn {
    private $host = 'localhost'; // e.g., localhost
    private $db = 'api_project'; // e.g., mydatabase
    private $user = 'apiProject'; // e.g., myusername
    private $pass = '148.'; // e.g., mypassword
    private $port = '5432'; // default is 5432
    protected $pdo;

    // public function __construct() {
    //     $this->connectionn();
    // }

    protected function connect(){
        try {
          $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db};"; 
          $con=$this->pdo = new PDO($dsn, $this->user, $this->pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
           echo "Connected to the PostgreSQL database successfully!";
           return $con;
        } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage(); 
          $this->pdo = null;
        }
    }

    // public function connect() {
    //     return $this->pdo;
    // }
}

// Example usage
// $db = new Conn();
// $connection = $db->connect();
// if ($connection) {
//     echo "Connected to the PostgreSQL1 database successfully!";
// } else {
//     echo "Failed to connect to the PostgreSQL database.";
// }
?>
