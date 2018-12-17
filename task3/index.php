<?php

class Connection {

    private $conn = null;
    public function __construct() {
        $this->connect();
    }

    public function connect() {
        if (!$this->conn) {
            $dbconn = new DatabaseConnection('localhost', 'user', 'password');
            $this->conn = $dbconn;
        }
        return $this->conn;
    }
}

class MyUserClass extends DB {

    private $users = array();
    public function getUserList()
    {
        if(sizeof($this->users)<=0) {
            $results = $this->connect()->query('select name from user');
            sort($results);
            $this->users = $results;
        }
        return $this->users;
    }
}

?>