<?php 

namespace Mini\Controller;
use Mini\Core\Session;
use Mini\Core\TemplatesFactory;
use Mini\Model\Message;


class Controller
{
	public function __construct()
	{
		Session::init();
		$this->view=TemplatesFactory::templates();
	}

	
}

 ?>