<?php
class userController
{
    public function login($username, $password){
        $db = new database();
        $con = $db->initDatabase();
        $statement = $con->prepare(query::LOGIN_QUERY());
        $statement->execute([$username, $password]);
        $row = $statement->fetch();
        if ($row) {
            return "Login successful!";
        } else {
            return "Invalid username or password.";
        }
    }

    // public function user_login(){
    //     $db = new database();
    //     $con = $db->initDatabase();
    //     $statement = $con->prepare("select * from user_tbl");
    //     $statement->execute();
    //     $row = $statement->fetchAll();
    //     foreach ($row as $data) {
    //         echo $data['user']."|".$data['pass']."<br>";
    //     }
    // }

    public function register($username, $password){
        $db = new database();
        $con = $db->initDatabase();
        $statement = $con->prepare("INSERT INTO user (user, pass) VALUES (?, ?)");
        try {
            $statement->execute([$username, $password]);
            return "Registration successful!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
