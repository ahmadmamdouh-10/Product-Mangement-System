<?php
//Including:
require_once "Product.php";
require_once "connection.php";
// select from
$queryString=$connection->prepare("select * from products WHERE status=1");
$queryString->execute();
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'Product');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
    h3{
        text-align: center;
        margin-top:10px;
        color: red;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>Product Management System</h3>
        <h6><a href="deletedproducts.php">Show Deleted Products</a></h6>
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">pro_name</th>
                <th scope="col">prod_brand</th>
                <th scope="col">prod_expiry_date</th>
                <th scope="col">prod_availability</th>
                <th scope="col">manage</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?= $product->id?></th>
                    <td><?= $product->pro_name?></td>
                    <td><?= $product->prod_brand?></td>
                    <td><?= $product->prod_expiry_date?></td>
                    <td><?= $prod_availability=($product->prod_availability==1)?"Available":"Not Available";
                        "Status: ".$prod_availability?></td>
                    <td><a href="edit.php?id=<?= $product->id?>"><i class="material-icons" style="color: #069500">edit_note</i></a> | <a href="softdelete.php?id=<?= $product->id?>"><i class="material-icons" style="color: darkred;">delete_sweep</i></a> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <form class="row g-3 needs-validation" enctype="multipart/form-data" action="insert.php" method="post" novalidate>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">product name</label>
                <input type="text" name="pro_name" class="form-control" id="validationCustom01" value="" required>
            </div>

            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Product Brand</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"></span>
                    <input type="text" name="prod_brand" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Expire Date</label>
                <input type="date"  name="prod_expiry_date" class="form-control" id="validationCustom03" required>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Availability</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="prod_availability" id="flexRadioDefault1" value="0" >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Not Available
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="prod_availability" id="flexRadioDefault2" value="1" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Available
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" name="insert" type="submit">Insert</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>