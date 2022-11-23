<?php require_once './connect.php'; ?>

<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM `products` WHERE `id`=:id";
        $stmt = $connection->prepare($query);
        $stmt->execute(array(":id"=>$id));
        header("location: ./index.php");
    }
?>