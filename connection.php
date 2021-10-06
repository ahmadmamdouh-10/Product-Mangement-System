<?php
//connection page of PHP and mysql that will including from it:
try {
    $connection=new PDO('mysql:host=localhost;dbname=vendor;','root','');
}catch (PDOException $exception){
    echo $exception->getMessage();
}