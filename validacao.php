<?php
    $userMaster = 'admin@blog.com';
    $passMaster = '123456';

    $email = $_POST['user'];
    $senha = $_POST['sen'];

    if($email == $userMaster && $senha == $passMaster){
        header("location: dashboard.php");
    } else{
        header("location: login.php?erro=1");
    }

    exit();
?>
