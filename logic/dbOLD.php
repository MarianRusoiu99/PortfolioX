<?php

class dbConn
{

    protected  $user;
    protected   $pass;
    protected  $dbhost;
    protected  $dbname;
    protected   $dbh; // Database connection handle

    public function __construct($user, $pass, $dbhost, $dbname)
    {
       echo "dbConn created";
        $this->user = $user;
        $this->pass = $pass;
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
    }

    protected function connect()
    {    echo "dbConn created";
        $this->dbh = mysqli_connect($this->dbhost, $this->user, $this->pass);
      /*   if (!mysqli_select_db($this->dbh,$this->dbname)) {
            throw new Exception;
        } */
        
    }
    public function execute($query)
    {
        if (!$this->dbh) {
            $this->connect();
        }
        $ret = mysqli_query($this->dbh , $query);
              if (!is_resource($ret)) {
            return TRUE;
        } else {
            $stmt = new dbConnStatement($this->dbh, $query);
            $stmt->result = $ret;
            return $stmt;
        }
    }
}

class dbConnStatement
{
    protected $result;
    public $query;
    protected $dbh;

    public function __construct($dbh, $query)
    {
        $this->query = $query;
        $this->dbh = $dbh;
        if (!is_resource($dbh)) {
            throw new Exception("Not a valid database connection");
        }
    }
    public function fetch_row()
    {
        if (!$this->result) {
            throw new Exception("Query not executed");
        }
        return mysqli_fetch_row($this->result);
    }
    public function fetch_assoc()
    {
        return mysqli_fetch_assoc($this->result);
    }
    public function fetchall_assoc()
    {
        $retval = array();
        while ($row = $this->fetch_assoc()) {
            $retval[] = $row;
        }
        return $retval;
    }
}


$db = new dbConn("root", "", "localhost", "porto");

$qu="INSERT INTO user (usr_id,username ,pass ,email) VALUES (1,'Vali','parola','valentinrusoiu@gmail.com');";
$db->execute($qu);
//$dbh->connect();