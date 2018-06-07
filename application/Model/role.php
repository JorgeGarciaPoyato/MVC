<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Role extends Model
{
 public function getRoles()
    {
    	$sql = 'SELECT * FROM roles';
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetchAll();
    }
	
}