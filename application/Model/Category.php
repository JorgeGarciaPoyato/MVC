<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Category extends Model
{
	public function getCategories()
    {
    	$sql = 'SELECT * FROM Categories';
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetchAll();
    }
}