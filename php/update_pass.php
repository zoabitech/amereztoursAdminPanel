<?php

use LDAP\Result;

session_start();
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    require_once("dbClass.php");
    require_once("validate.php");
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $db = new dbClass();
    $admin = $db->checkUserExist($username);
    if ($admin) {
        $result = $db->updatePassword($username, $password);
        if ($result)
            header('Location: http://127.0.0.1:5500/PHP/Login&Sign.htm');
        else
            echo "failure";
    } else {
        echo
        "<script>
        if(confirm('This admin does not exist in the data base please try again!'))
            window.location.href = 'http://127.0.0.1:5500/PHP/reset_pass.htm';
        </script>";
    }
}
