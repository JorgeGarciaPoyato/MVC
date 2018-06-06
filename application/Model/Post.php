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
}