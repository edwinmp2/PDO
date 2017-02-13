<?php

class Auth{
	protected $pdo;

	public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($user,$password)
    {
    	$statement = $this->pdo->prepare("select * from users where username='{$user}'");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS);
        // var_dump($data[0]->password);exit;
    	if (!empty($data[0]->username)) {
    		if (password_verify($_POST['password'], $data[0]->password)) {
    			session_start();
    			$_SESSION['user'] = $data[0]->id;

				echo "<script> alert('Login sukses!');      
				        window.location.href='index.php';
				</script>";
    		}else{
    			echo "<script> alert('Username atau password salah!');      
				        window.location.href='login.php';
				</script>";
    			// header("location : login.php");
    		}
    	}else{
    		header("location: login.php");
    	}
    }

    public function logout($parameters)
    {
    	session_unset($parameters);
    }

    public function getName($parameters)
    {
    	$statement = $this->pdo->prepare("select * from users where id='{$parameters}'");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS);

        return $data[0]->username;
    }

    public function register($parameters)
    {
    	$user = $parameters['username'];
    	$statement = $this->pdo->prepare("select * from users where username='{$user}'");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_CLASS);

        if (!empty($data)) {
        	// var_dump($data);exit;
        	echo "<script> alert('Username telah terdaftar!');      
			        window.location.href='register.php';
			</script>";
        }else{
	    	$sql = sprintf(
	            'insert into users (%s) values (%s)',
	            implode(', ', array_keys($parameters)),
	            ':' . implode(', :', array_keys($parameters))
	        );

	        try {
	            $statement = $this->pdo->prepare($sql);
	            $statement->execute($parameters);

	            //return true;
	            header("location: login.php");

	        } catch (\Exception $e) {

	            return false;

	        }
        }

    }
}

?>