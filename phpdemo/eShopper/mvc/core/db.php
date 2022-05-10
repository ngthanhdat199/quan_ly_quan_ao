<?php
class db{
    public $con;
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "quan_ly_quan_ao";

    function __construct() {
        $this->con = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }
}

?>