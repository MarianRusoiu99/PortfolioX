

<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class Dbc {
    // private $host = 'localhost';
    // private $user = 'u283226794_Valentin';
    // private $pass = 'Lifeisstrange123';
    // private $dbname = 'u283226794_PortofolioDB1';

    // private $host = 'localhost';
    // private $user = 'root';
    // private $pass = '';
    // private $dbname = 'porto';

    public function connect(){
        echo "connected";
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
        return $pdo; 
    }
}





?>