<?php 

	namespace Mini\Controller;

	use Mini\Model\Login;
	use Mini\Core\Session;
 
	/**
	* 
	*/
	class LoginController extends Controller
	{
		
		public function index(){

			$this->view->addData(["titulo"=>"HOME"]);
        	echo $this->view->render("login/index");
		}

		public function doLogin()
		{
			$login = new Login();

			$login->doLogin($_POST);

			if ($login->doLogin($_POST)) {

			$this->view->addData(["titulo"=>"login"]);
        	header("Location: /home");

			} else {
				echo ("Email o contraseña incorrecta");
				$this->view->addData(["titulo"=>"HOME"]);
        		echo $this->view->render("login/index");

			}

		}

		public function salir(){

			Session::destroy();
			header('location: /home');
		}
	}
 ?>