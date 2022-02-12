<?php
session_start();
include_once('connection.php');
if(isset($_POST['enter'])){
    $user = $_POST['user_name'];
    $pass = $_POST['password'];
}
   
    $result = mysqli_query($conn,"SELECT id FROM compte where user='".$user."' and pass='".$pass."'" );
    $nblignes = mysqli_num_rows($result);

    if($nblignes){
        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;
        $row = mysqli_fetch_assoc($result);
        $res = mysqli_query($conn,"SELECT * FROM login where id='".$row['id']."'");
        $row = mysqli_fetch_assoc($res);
        echo "Bienvenue ".$row['full_name'];
        header('location:tablau.php');
        exit();
    }
    else{
        echo 'mot de pass ou nom utilisateur eroner';
    }
?>