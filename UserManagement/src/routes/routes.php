<?php
include_once('../static/query.php');
include_once('../controller/database.php');
include_once('../controller/userController.php');


if (isset($_POST['type'])) {
    switch ($_POST['type']) {
        case 'login':
            $ctr = new userController();
            echo $ctr->login($_POST['user'],$_POST['pass']);
            break;
        case 'register':
            $ctr = new userController();
            echo $ctr->register($_POST['user'], $_POST['pass'], $_POST['email']);
            break;
        case 'editRole':
            $ctr = new userController();
            echo $ctr->updateRole($_POST['userId'], $_POST['role']);
            break;
        case 'deleteUser':
            $ctr = new userController();
            echo $ctr->deleteUser($_POST['userId']);
            break;
            
        
        default:
            # code...
            break;
    }
}
?>
