<?php 

namespace Mini\Core;


/**
* 
*/
class Auth 
{
	
	public static function checkAuth($role, $redirect = true){

		$acceso = ["Student" => 1 , "Teacher" => 2, "Admin" => 3];

		Session::init();

		if (!isset($_SESSION["user_role"])) {
			
			Session::destroy();

			if ($redirect) {
				
				header("Location: /login");

			}

			exit();


		} 

		if ($acceso[Session::get("user_role")] >= $acceso[$role]) {

			return true;
			
		}

		if ($redirect) {

			header("Location: /error");

		}

		return false;


	}


	
}




 ?>