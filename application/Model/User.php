<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class User extends Model
{
 public function getUsers()
    {
    	$sql = 'SELECT * FROM users';
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetchAll();
    }

 	public function getUser($id)
    {
    	$sql = "SELECT * FROM users WHERE id = $id";
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetch();
    }

     public function insert($datos)
    {   
        $date = date("Y-m-d h:i:m");
        $sql = "INSERT INTO users (role_id,name,email,password,created_at,updated_at) VALUES ($datos[role_id] , '$datos[name]' , '$datos[email]' , '$datos[password]' , '$date' , '$date' )";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }
     public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = $id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }

    public function update($datos, $id)
    {   
        $date = date("Y-m-d h:i:m");
        //$sql = "UPDATE users  SET name = '$datos[name]'  , email = '$datos[email]' , password = 'md5($datos[password])' , updated_at = '$date' WHERE id = $id";
        $sql = "UPDATE users SET name = '$datos[name]' , email= '$datos[email]' , password = '$datos[password]', updated_at ='$date' WHERE id = $id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return true;
    }
	
}