<?php

    require_once "koneksi.php";

    $sql = "SELECT * FROM  tbl_article";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $article = $stmt->fetchAll(PDO::FETCH_BOTH);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Article</title>
</head>
<body>
    <a href="create.php" >Tambah</a>
    <table border="1">
        <tr>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diubah</th>
            <th>Hapus</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($article as $d)  : ?>
        <tr>
            <td><?= $d['judul'] ?></td>
            <td><?= $d['isi'] ?></td>
            <td><?= $d['created_at'] ?></td>
            <td><?= $d['updated_at'] ?></td>
            <td>
                <a href="delete.php?id=<?= $d['id']?>" title="">Hapus</a>
            </td>
            <td>
                <a href="edit.php?id=<?= $d['id']?>" title="">Edit</a>
            </td>
        </tr>
        <?php endforeach ;?>
    </table>
</body>
</html>
