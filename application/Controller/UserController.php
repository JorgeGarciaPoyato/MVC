<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Message;

use Mini\Model\User;

use Mini\Model\Role;

use Mini\Core\Auth;

use Mini\Core\Functions;


class UserController extends Controller
{

    public function usersAdmin()
    {
       //Auth::checkAuth("Admin");
        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
          
        
        $users = new User();
        $users = $users->getUsers();

        $this->view->addData(["user"=>"user" , "users" => $users]);
        echo $this->view->render("users/todousers");
        
        }
        else
        {
            header("Location: /home");
        }
    }

     public function create()
     {
        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
        $roles = new Role();
        $roles = $roles->getRoles(); 
        $this->view->addData(["title"=>"user", "roles" => $roles]);
        echo $this->view->render("users/crearuser");
    }else
        {
            header("Location: /home");
        }
}

    public function store()
    {

        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {

         $user = new User();
          $_POST['password'] = md5($_POST['password']);
            $datos = array(
                'name' => $_POST["name"],
                'email' => $_POST["email"],
                'password' => ($_POST['password']),
                'role_id' => $_POST["role_id"],
            );
          
           
             $user->insert($datos);
             header("Location: /user/usersAdmin");
        }else
        {
            header("Location: /home");
        } 
    }

    public function delete($id){

        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {

          $user = new User();

           if($user->delete($id)) {

            header("Location: /user/usersAdmin");

            } else {

            echo "No se ha borrado";

            }
        }else
        {
            header("Location: /home");
        }
    }

 
    public function edit($id){

       if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
        $users = new User();
        $users = $users->getUser($id);   

        $this->view->addData(["titulo"=>"users", "users" => $users]);
        echo $this->view->render("/users/edituser");
    }else
        {
            header("Location: /home");
        }
}
    public function update ($id)
    {
         if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
        
            $_POST['password'] = md5($_POST['password']);
       
            $users = new User();
           //$datos = array(['name' => $_POST["name"], 'email' => $_POST["email"], 'password' => md5($_POST["password"])]);

            $users->update($_POST,$id);

            header("Location: /user/usersAdmin");
        }else
        {
            header("Location: /home");
        }
    

    }
}
