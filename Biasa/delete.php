<?php
    require_once "koneksi.php";



    if(isset($_GET["id"])){

        $user_id = $_GET['id'];

        $sql = "DELETE FROM tbl_article WHERE id=:id";
        $stmt =$pdo->prepare($sql);
        $stmt->execute([':id'=>$user_id]);

        header("location: index.php");
    }

?>
