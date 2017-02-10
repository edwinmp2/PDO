<?php
    require_once "koneksi.php";

    if(isset($_GET["id"])){
        $article_id = $_GET['id'];

        $sql = "SELECT * FROM tbl_article WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id'=>$article_id]);
        $article = $stmt->fetch();

    }

    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $sql = "SELECT * FROM tbl_article WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $article = $stmt->fetch();


        $judul = is_null($_POST['judul']) ? $_POST['judul'] : $article['judul'];

        try {

            $params =[
                'judul'         => $judul,
                'isi'           => $_POST['isi'],
                'updated_at'    => date('Y/m/d'),
                'id'            => $id
            ];

            $sql = "UPDATE tbl_article SET judul=:judul,isi=:isi,updated_at=:updated_at WHERE id=:id ";

            $statement = $pdo->prepare($sql);
            $statement->execute($params);

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
    <title>Ubah Artikel</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="edit.php" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $article['id']?>">
        <p>Judul</p>
        <input type="text" name="judul" value="<?= $article['judul']?>" placeholder="" >
        <p>Isi</p>
        <textarea name="isi" required><?= $article['isi']?></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
