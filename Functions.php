<?php

class Functions {

    function dbConnect() {
        $db = "bitswifi";
        $host = "localhost";
        $user = "root";
        $pass = "";

        return new mysqli($host, $user, $pass, $db);
    }

    function registerClient($query) {
        $conn = $this->dbConnect();
        $res = $conn->query($query);
        $conn->close();
    }

    function checkClientExists($phone) {
        $conn = $this->dbConnect();
        $sql = "select fname from user where phone = '$phone'";
        $res = $conn->query($sql);
        $ret = 0;
        
        if($res->num_rows > 0) {
            $ret = 1;
        }
        $conn->close();
        return $ret;
    }

    function loginClient($data) {
        $conn = $this->dbConnect();
        $sql = "select * from user where phone = '".$data["phone"]."' and password = '".$data["password"]."'";
        $res = $conn->query($sql);
        $row = array();

        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
        }
        $conn->close();
        return $row;
    }
}
?>