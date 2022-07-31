<?php

class DataBase {
    public function __construct(private string $host,
                                private string $name,
                                private string $user,
                                private string $password) {

    }

    public function getConnection(): mysqli {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

}