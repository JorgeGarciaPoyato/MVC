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
        Auth::checkAuth("Admin");
        if ($_SESSION['user_role'] == 'Admin') {
           
        
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
        $posts = $posts->getPost($id);
        $this->view->addData(["titulo"=>"posts" , "posts" => $posts]);
        echo $this->view->render("posts/post");
    }

     public function create()
     {

        Auth::checkAuth("Administrador");

        $tags = new Tag();
        $tags = $tags->getTags();

        $categories = new Category();
        $categories = $categories->getCategories();

  
        $this->view->addData(["titulo"=>"post" , "tags" => $tags , "categories" => $categories]);
        echo $this->view->render("posts/create");

    }

    public function store()
    {

         Auth::checkAuth("Administrador");
         $tags = $_POST['tags'];
         unset($_POST['tags']);

         $_POST["slug"] = Functions::slug($_POST["name"]);

         $post = new Post();

        if($id = $post->create($_POST)) {
                
            $post->postTag($id, $tags);

            if(isset($_FILES)) $this->file($_FILES['file'] , $id);

            header("Location: /post/postsAdmin");
        } else {

            header("Location: /error");

        }
    }

    public function edit($slug){

        Auth::checkAuth("Administrador");
        $post = new Post();
        $post = $post->getPost($slug);
        $tags = new Tag();
        $tags = $tags->getTags();
        $categories = new Category();
        $categories = $categories->getCategories();

        
        $this->view->addData(["titulo"=>"post", "post"=>$post , "tags" => $tags , "categories" => $categories ]);
        echo $this->view->render("posts/edit");
    }

    public function update($id)
    {
        Auth::checkAuth("Administrador");

            $tags = $_POST['tags'];
            unset($_POST['tags']);

            $_POST["slug"] = Functions::slug($_POST["name"]);
            $post = new Post();


            if($post->update($id , $_POST)) {

                $post->deletePostTag($id);

                $post->postTag($id, $tags);

                if(isset($_FILES)) $this->file($_FILES['file'] , $id);

                header("Location: /post/postsAdmin");

            } else {

            header("Location: /error");

            }


    }

     public function delete($id){

          Auth::checkAuth("Admin");

          $post = new Post();

           if($post->delete($id)) {

            header("Location: /post/postsAdmin");

            } else {

            echo "NO vaaaaaaaaaaaaaaaaaa";

            }

    }



   
}
