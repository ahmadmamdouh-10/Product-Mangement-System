<?php
// include connection with mysql:
    require_once "connection.php";
    // Deep delete from database 'SHIFT DELETE' by Id
    $queryString=$connection->prepare("DELETE FROM products WHERE id=?");
    $id=$_GET["id"];
    $queryString->execute([$id]);
    header("Location: index.php");
