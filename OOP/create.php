<?php
    require_once "database/Connection.php";
    require_once "database/QueryBuilder.php";
    require_once "config/database.php";

    if(isset($_POST['submit'])){
        try {
            $connection = Connection::make($config);
            $db = new QueryBuilder($connection);
            $db->insert('tbl_article', [
	            'judul' => $_POST['judul'],
	            'isi' => $_POST['isi'],
	            'created_at' => date('Y/m/d'),
	            'updated_at' => date('Y/m/d')
	        ]);
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
