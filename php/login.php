<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once("dbClass.php");
    require_once("validate.php");
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $db = new dbClass();
    $admin = $db->selectAdmin($username, $password);
    if ($username === $admin) {
        $_SESSION['logged_in'] = true;
        header('Location: http://127.0.0.1:5500/PHP/index.htm');
    } else {
        $_SESSION['logged_in'] = false;
        echo
        "<script>
        if(confirm('Please Check Your Login Information!'))
            window.location.href = 'http://127.0.0.1:5500/PHP/Login&Sign.htm';
        </script>";
    }
}
