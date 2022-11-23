<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        tr,
        th,
        td {
            border: 1px solid gray;
            text-align: center;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <?php require_once './connect.php';
        $query = "SELECT * FROM products";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $productsList = $stmt->fetchAll();

    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Desc</th>
            <th>Price</th>
            <th><a href="./more_product.php">Thêm</a></th>
        </tr>
        <?php foreach ($productsList as $item) : ?>
            <tr>
                <td><?php echo $item['productName'] ?></td>
                <td><?php echo $item['productDesc'] ?></td>
                <td><?php echo $item['productPrice'] ?></td>
                <td><a href="./update_product.php?id=<?php echo $item['id']?>">Sửa</a> | <a href="./delete_product.php?id=<?php echo $item['id']?>">Xóa</a></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>