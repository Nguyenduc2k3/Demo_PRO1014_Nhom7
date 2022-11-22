<?php  
    $hostname = 'localhost';
    $db_name = 'pro1014_da1_group7';
    $username ='root';
    $pass = '';
    try{
        $connect = new PDO ("mysql:host=$hostname;dbname=$db_name",$username,$pass);
        $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Connect Successful";
    }
    catch(PDOException $e){
        echo $e ->getMessage();
    }
?>