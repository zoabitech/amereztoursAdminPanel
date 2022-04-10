<?php
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    require_once("dbClass.php");
    require_once("validate.php");
    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $db = new dbClass();
    $a = new Admin();
    $a->setUserName($username);
    $a->setEmail($email);
    $a->setUserPassword($password);
    $result = $db->insertAdmin($a);
    if ($result)
        header('Location: http://127.0.0.1:5500/PHP/Login&Sign.htm');
    else
        echo "failure";
}
