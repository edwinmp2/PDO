<?php
    session_start();

	require_once "database/Connection.php";
    require_once "config/database.php";
    require_once "database/Auth.php";

	if(isset($_POST['submit'])){
        try {
            $connection = Connection::make($config);
            $db = new Auth($connection);
            $db->login($_POST['username'], $_POST['password']);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    if (isset($_SESSION['user'])) {
        header("location: index.php");
    }else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Article</title>
</head>
<body>
	<h2>Login</h2>
	<form action="login.php" method="post" accept-charset="utf-8">
	<span>Username : </span><input type="text" name="username" required>
	<span>Password : </span><input type="password" name="password" required>
	<input type="submit" name="submit" value="Login">
	</form>
	<a href="register.php">Daftar sekarang</a>
</body>
</html>

<?php }?>