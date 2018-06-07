<?php 


	namespace Mini\Model;
	use Mini\Core\Model;
	use Mini\Core\Session;

	class Login extends Model
	{
		public function doLogin($datos)
		{
			 if (!$datos) {

			 	Session::add('feedback_negative' , 'Datos no encontrados');
			 }

			 if (empty($datos['password'])) {

			 	Session::add('feedback_negative' , 'Clave no recibida');
			 }
			 				 
	
			$datos['email'] = trim($datos['email']);

			if (!filter_var($datos['email'] , FILTER_VALIDATE_EMAIL)) {
			
				Session::add('feedback_negative' , 'Email no valido');
			}

			if (strlen($datos['password']) <= 6) {
			
				Session::add('feedback_negative' , 'La clave tiene que tener al menos 6 caracteres');
			}

			if (Session::get('feedback_negative')) {

				//return false;
			
			}
			$sql = 'SELECT u.* ,  r.name as role from users as u , roles as r where u.role_id = r.id and email = :email';

			$query = $this->db->prepare($sql);

			$query->bindValue(':email' , $datos['email']);

			$query->execute();

			$number = $query->rowCount();

			if($number != 1){

				Session::add('feedback_negative' , 'Email no registrado');
				return false;
			}

			$usuario = $query->fetch();

			if ($usuario->password != md5($datos['password'])) {
				
				Session::add('feedback_negative' , 'La clave no coincide');

				return false;

			}

			Session::set('user_id' , $usuario->id);

			Session::set('user_name' , $usuario->name);

			Session::set('user_email' , $datos['email']);

			Session::set('user_role' , $usuario->role);

			Session::set('status' , $usuario->status);  

			return true;

		}

	}

 ?>