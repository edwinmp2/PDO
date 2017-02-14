<?php
    session_start();
    
    require_once "database/Connection.php";
    require_once "database/Auth.php";
    require_once "config/database.php";

    if(isset($_POST['submit'])){
        try {
            $connection = Connection::make($config);
            $db = new Auth($connection);
            $db->register([
	            'username' => $_POST['username'],
	            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'email' => $_POST['email'],
                'created_at' => date('Y/m/d h:i:s'),
	        ]);
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
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post" accept-charset="utf-8">
        <p>Username</p>
        <input type="text" name="username" value="" placeholder="username" required>
        <p>Pasword</p>
        <input type="password" name="password" placeholder="password" required>
        <p>Email</p>
        <input type="text" name="email" placeholder="example@email.com" required>
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <a href="login.php">kembali ke halaman login</a>
</body>
</html>

<?php } ?>
