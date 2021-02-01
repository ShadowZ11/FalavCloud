<?php
	require_once ("conf.inc.php");

	function connectFalaDB(){
			try{

			$connect = new PDO(
				"pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME,DBUSER,DBPWD );
		}catch(Exception $e){
			die("Erreur au niveau de la base de données ".$e->getMessage());
		}
		return $connect;
	}

	function emailExist($connect, $email){

		$queryPrepared = $connect->prepare(
			"SELECT id_users FROM users WHERE email = :email" );

		$queryPrepared->execute(["email"=>$email]);
		$result = $queryPrepared->fetch();

		return (empty($result))?false:true;
	}

	function pseudoExist($connect, $userName){

		$queryPrepared = $connect->prepare(
			"SELECT id_users FROM users WHERE pseudo = :userName" );

		$queryPrepared->execute(["userName"=>$userName]);
		$result = $queryPrepared->fetch();

		return (empty($result))?false:true;
	}


	function createToken($email, $id_users){

		return md5($email.SALT.$email.$id_users);
	}

	function Connect(){
		if( !empty($_SESSION["id"]) &&  !empty($_SESSION["email"]) && !empty($_SESSION["token"])){

			$connect = connectFalaDB();

			if(emailExist($connect, $_SESSION["email"])){

				$newToken = createToken($_SESSION["email"], $_SESSION["id"]);

				if($newToken == $_SESSION["token"]){
					return true;
				}else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
		}
	}
