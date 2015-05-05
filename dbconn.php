<?Php
	$dns = 'mysql:host=localhost;dbname=ensconnect';
	$user = 'root';
	$pass = '';
	
		try{
		$db = new PDO($dns,$user,$pass);
	} catch(PDOException $e){
		$error_message = $e->getMessage();
		exit();
	}
?>