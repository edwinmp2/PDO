<?php
    require_once "koneksi.php";

    if(isset($_POST['submit'])){
        try {

            $params  = [
                ':judul'         => $_POST['judul'],
                ':isi'           => $_POST['isi'],
                ':created_at'    => date('Y/m/d'),
                ':updated_at'    => date('Y/m/d'),
            ];

            $sql = "INSERT INTO tbl_article (judul,isi,created_at,updated_at) VALUES  (:judul,:isi,:created_at,:updated_at)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($params);

            header("location: index.php");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="create.php" method="post" accept-charset="utf-8">
        <p>Judul</p>
        <input type="text" name="judul" value="" placeholder="" >
        <p>Isi</p>
        <textarea name="isi" required></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
