<?php
include("Product.php");
try {
    $connection=new PDO('mysql:host=localhost;dbname=vendor','root','');
    $queryString=$connection->prepare("select * from products");

    $queryString->execute();
    $users=$queryString->fetchAll(PDO::FETCH_CLASS,'Product');
    ?>
    <table border="2px">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Login Permission</th>
            <th>Status</th>
        </tr>
        <?php foreach ($products as $product):?>
            <tr>
                <td><?= $product->pro_name?></td>
                <td><?= $product->prod_brand?></td>
                <td><?= $available=($product->prod_availability==1)?"Available":"Not Available";
                    "Status: ".$available?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php

}catch (PDOException $exception){
    echo $exception->getMessage();
}

/*function calc($x){
    if($x>=10){
    return "Yes";
    }else{
        throw  new Exception("sorry your number is not >=10");
    }
}

try {
    echo calc(15);
}catch (Exception $errobj){
   echo $errobj->getMessage();
}*/