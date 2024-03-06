<?php
include('../functions/myfunctions.php');
if(isset($_SESSION['auth'])){
    if(isset($_SESSION['role_as']) != 1){
        redriect("../index.php","Please, Log in as Admin!");
    }
}else{
    redriect("../login.php","Login to Continue!");
}
?>