<?php
    require_once "database/Connection.php";
    require_once "database/QueryBuilder.php";
    require_once "config/database.php";

    $connection = Connection::make($config);
    $db = new QueryBuilder($connection);
    $article = $db->find('tbl_article',$_GET['id']);
    
    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        
        try {
            $db->update('tbl_article', [
	            'judul' => $_POST['judul'],
	            'isi' => $_POST['isi'],
	            'created_at' => date('Y/m/d'),
	            'updated_at' => date('Y/m/d')
	        ],$id);
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
    <title></title>
</head>
<body>
    <form action="edit.php?id=<?= $article[0]->id; ?>" method="post" accept-charset="utf-8">
        <p>Judul</p>
        <input type="text" name="judul" value="<?= $article[0]->judul ?>" placeholder="" >
        <p>Isi</p>
        <textarea name="isi" required><?= $article[0]->isi ?></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
