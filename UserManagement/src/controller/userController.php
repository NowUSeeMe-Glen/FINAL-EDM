<?php
include_once('database.php');

class userController
{
    public function login($username, $password) {
        $db = new database();
        $con = $db->initDatabase();
    
        // Fetch the user by username
        $statement = $con->prepare("SELECT pass, role FROM user WHERE user = ?");
        $statement->execute([$username]);
        $row = $statement->fetch();
    
        if ($row && password_verify($password, $row['pass'])) {
            return json_encode(['status' => 'success', 'role' => $row['role']]);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
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

    public function register($username, $password, $email) {
        $db = new database();
        $con = $db->initDatabase();
    
        // Hash the password before saving to the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $statement = $con->prepare("INSERT INTO user (user, pass, email) VALUES (?, ?, ?)");
        try {
            $statement->execute([$username, $hashedPassword, $email]);
            return "Registration successful!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    

    public function getAllUsers() {
        $db = new database();
        $con = $db->initDatabase();
        $statement = $con->prepare("SELECT id, user, email, role FROM user");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRole($userId, $role) {
        $db = new database();
        $con = $db->initDatabase();
        $statement = $con->prepare("UPDATE user SET role = ? WHERE id = ?");
        try {
            $statement->execute([$role, $userId]);
            return "Role updated successfully!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteUser($userId) {
        $db = new database();
        $con = $db->initDatabase();
        $statement = $con->prepare("DELETE FROM user WHERE id = ?");
        try {
            $statement->execute([$userId]);
            return "User deleted successfully!";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }



}
