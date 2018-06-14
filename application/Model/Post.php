<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Post extends Model
{
	public function getPosts()
    {
    	$sql = 'SELECT p.* , g.name as grade , c.name as category FROM posts as p , grades as g , categories as c WHERE g.id = grade_id and c.id = category_id';
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetchAll();
    }

    public function getPost($id)
    {
    	$sql = "SELECT p.* , g.name as grade , c.name as category FROM posts as p , grades as g , categories as c WHERE p.id = $id and g.id = grade_id and c.id = category_id";
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = $id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }

    public function insert($datos)
    {   
        $date = date("Y-m-d h:i:m");
        //$params = array(':title' => $datos['title'],':excerpt' => $datos['excerpt'],':body' => $datos['body'],':user_id' => $datos['id'],':category_id' => $datos['category'],':grade_id' => $datos['grade']);
        //d($params);

       // $sql = "INSERT INTO posts (title, excerpt, body, user_id, category_id, grade_id, created_at , updated_at) VALUES (':title',':excerpt',':body',:user_id,:category_id,:grade_id,'$date', '$date')";
        $sql = "INSERT INTO posts (title,excerpt,body,user_id,category_id,grade_id,created_at,updated_at) VALUES ('$datos[title]' , '$datos[excerpt]' , '$datos[body]' , $datos[id] , $datos[category] , $datos[grade] , '$date' , '$date' )";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }

    public function update($datos,$id)
    {   
        $date = date("Y-m-d h:i:m");
        $sql = "UPDATE posts  SET title = '$datos[title]'  , excerpt = '$datos[excerpt]' , body = '$datos[body]' , category_id = '$datos[category]' , grade_id = '$datos[grade]' , updated_at = '$date' WHERE id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }

    public function comprobar($user){

        $sql = "SELECT status FROM users WHERE id = $user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    public function suscripcion($id){

        $sql = "UPDATE users SET status = 'suscrito' WHERE id = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }


    public function listarcategorias($name){

        $sql = "SELECT p.* , g.name as grade , c.name as category FROM posts as p , grades as g , categories as c WHERE g.id = grade_id and c.id = category_id and c.name = '$name'";
       // var_dump($sql);
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}