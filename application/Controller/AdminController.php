<?php

namespace Mini\Controller;

use Mini\Model\Post;

use Mini\Core\Auth;

class AdminController extends Controller
{

   public function index(){

        //Auth::checkAuth("Admin");

   if ($_SESSION['user_role'] == 'Admin') {
        $this->view->addData(["titulo"=>"ADMIN"]);
        echo $this->view->render("admin/index");


    
     }
        else
        {
            header("Location: /home");
        }

       }
   
}
