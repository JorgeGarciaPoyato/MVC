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

use Mini\Model\Post;

use Mini\Model\Category;

use Mini\Model\Grade;

use Mini\Core\Auth;

use Mini\Core\Functions;


class PostController extends Controller
{

    public function index()
    {

        //Auth::checkAuth("Alumno");

        $posts = new Post();
        $posts = $posts->getPosts();
        $this->view->addData(["titulo"=>"post" , "posts" => $posts]);
        echo $this->view->render("posts/index");


    }


    public function postsAdmin()
    {
        //Auth::checkAuth("Admin");
        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
           
        
        $posts = new Post();
        $posts = $posts->getPosts();

        $this->view->addData(["titulo"=>"post" , "posts" => $posts]);
        echo $this->view->render("posts/todopost");
        
        }
        else
        {
            header("Location: /home");
        }


    }

    public function show($id)
    {
        $posts = new Post();
        $user = $_SESSION['user_id'];
        $suscrito = $posts->comprobar($user);
        //var_dump($suscrito->status);
        //exit();
        if ($suscrito->status == 'suscrito') {
           $posts = $posts->getPost($id);
            $this->view->addData(["titulo"=>"posts" , "posts" => $posts]);
            echo $this->view->render("posts/post");
        }else if ($suscrito->status =='nosuscrito'){
            header("Location: /post/suscripcion");
        }
    }
    public function suscripcion()
    {
            $this->view->addData(["titulo"=>"posts"]);
            echo $this->view->render("/posts/suscripcion");
    }

    public function suscrito(){
        $posts = new Post();
            $id = $_SESSION['user_id'];
            $posts = $posts->suscripcion($id);
            $this->view->addData(["titulo"=>"posts"]);
           header("Location: /home");
    }

     public function create()
     {

        //Auth::checkAuth("Admin");
        if ($_SESSION['user_role'] == 'Admin' || 'Teacher') {
        $categories = new Category();
        $categories = $categories->getCategories();

        $grades = new Grade();
        $grades = $grades->getGrades();

        $this->view->addData(["titulo"=>"post" , "categories" => $categories , "grades" => $grades]);
        echo $this->view->render("posts/crearpost");
    }
    }

    public function store()
    {

        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {

        // $_POST["slug"] = Functions::slug($_POST["title"]);

         $post = new Post();

         /*
            if(!isset($_POST["title"]))
                $_POST["title"] = "";
            if(!isset($_POST["excerpt"]))
                $_POST["excerpt"] = "";
            if(!isset($_POST["body"]))
                $_POST["body"] = "";
            if(!isset($_POST["category"]))
                $_POST["category"] = "";
            if(!isset($_POST["grade"]))
                $_POST["grade"] = "";
            if(!isset($_POST["id"]))
                $_POST["id"] = "";
        */
            $datos = array(
                'title' => $_POST["title"],
                'excerpt' => $_POST["excerpt"],
                'body' => $_POST["body"],
                'category' => $_POST["category"],
                'grade' => $_POST["grade"],
                'id' => $_POST["id"],
            );
           
             $post->insert($datos);
             header("Location: /post/postsAdmin");
        } 
    }

    public function edit($id){

       if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
        $post = new Post();

        $post = $post->getPost($id);

        $categories = new Category();
        $categories = $categories->getCategories();

        $grades = new Grade();
        $grades = $grades->getGrades();

        
        $this->view->addData(["titulo"=>"post", "post"=>$post , "grades" => $grades , "categories" => $categories ]);
        echo $this->view->render("/posts/edit");
    }
}
    public function update($id)
    {
        if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {

       
            $post = new Post();
            $datos = array(
                'title' => $_POST["title"],
                'excerpt' => $_POST["excerpt"],
                'body' => $_POST["body"],
                'category' => $_POST["category"],
                'grade' => $_POST["grade"],
                'id' => $_POST["id"],
            );

            $post->update($datos,$id);
            header("Location: /post/postsAdmin");

    }
}
     public function delete($id){

          if ($_SESSION['user_role'] == 'Admin' || $_SESSION['user_role'] == 'Teacher') {
          $post = new Post();
           if($post->delete($id)) {

            header("Location: /post/postsAdmin");

            } else {

            echo "NO vaaaaaaaaaaaaaaaaaa";

            }
        }
    }

     public function categorias($name){

        $posts = new Post();

        $posts = $posts->listarcategorias($name);
        $this->view->addData(["titulo"=>"posts", "posts"=>$posts]);
        echo $this->view->render("posts/filtrarcategorias");
    }



   
}
