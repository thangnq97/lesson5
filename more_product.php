<?php require_once './connect.php'; ?>
<?php 
    if(isset($_POST['more_pro'])) {
        $user_name = $_POST['user_name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $categoryId = $_POST['categoryId'];
        if($user_name == '' || $desc == '' || $price == '' || $categoryId == '') {
            echo 'Vui lòng nhập đủ thông tin';
        }
        if($user_name != '' && $desc != '' && $price != '' || $categoryId == '') {
            $query = "INSERT INTO `products`(`productName`, `productDesc`,`productPrice`,`categoryId`) VALUES (:user_name, :desc, :price, :categoryId)";
            $stmt = $connection->prepare($query);
            $stmt -> execute(array(":user_name"=>$user_name, ":desc"=>$desc, ":price"=>$price, ":categoryId"=>$categoryId));
            header("location: ./index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container {
            max-width: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="user_name">Name</label>
                <input type="text" name="user_name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="desc">Desception</label>
                <input type="text" name="desc" class="form-control" placeholder="Descreption">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="categoryId">categoryId</label>
                <input type="number" name="categoryId" class="form-control" placeholder="categoryId">
            </div>
            <button type="submit" name="more_pro" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>