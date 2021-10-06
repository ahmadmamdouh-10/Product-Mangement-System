<?php
//including connection page with require built function :
require_once "connection.php";
//check if user accessing the page within request of POST not with direct link:
if(isset($_POST["insert"])&& !empty($_POST)){
    //SQL Query of MySQL but using PHP and for avoiding injections you won't put the inserted value on same query:
    $queryString=$connection->prepare("INSERT INTO products (pro_name,prod_brand,prod_expiry_date,prod_availability,status)VALUES(?,?,?,?,?)");
    //declaring your insert values that that user will put into DB "Declaring what '?' refers to:"
    $pro_name=$_POST["pro_name"];
    $prod_brand=$_POST["prod_brand"];
    $prod_expiry_date=$_POST["prod_expiry_date"];
    $prod_availability=$_POST["prod_availability"];
    //Putting Status value always true for insert to handling soft delete:
    $status=1;
    //If user insert exactly data to DB These data will be displayed into our home table management system:
    if($queryString->execute([$pro_name,$prod_brand,$prod_expiry_date,$prod_availability,$status])){
                header("Location: index.php");
            }else{
        //if insert processing doesn't complete well so display an error and back to homepage again after 3secs:
                echo"Failed to insert";
                header("Refresh: 3;URL=index.php");
            }
    //if you are accessing this page directly, print an error and back him directly to the right method to access this page:
}else{
    echo"Error: You cannot access this page directly, Back to home!";
//    header("Refresh: 3;URL=index.php");
}