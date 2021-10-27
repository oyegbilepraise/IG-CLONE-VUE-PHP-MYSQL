<?php

class Controller
{
    protected $dbName = 'instagram_db';
    protected $password = '';
    protected $username = 'root';
    protected $server = 'localhost';

    public $con;

    public function __construct()
    {
        $this->con = new mysqli($this->server, $this->username, $this->password, $this->dbName);
        if ($this->con->connect_error) {
            die('Failed Connection' . $this->con->connect_error);
        } else {
            echo 'connected lowokan';
        }
    }
}

// <?php

// $dbName = "instagram_db";
// $password = "";
// $username = "root";
// $server = "localhost";
// $con = mysqli_connect($server, $username, $password, $dbName);
// if ($con->connect_error) {
//     die("connection not successful");
// }
