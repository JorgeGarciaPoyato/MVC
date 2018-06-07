<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Grade extends Model
{
	public function getGrades()
    {
    	$sql = 'SELECT * FROM Grades';
    	$query = $this->db->prepare($sql);
    	$query->execute();
    	return $query->fetchAll();
    }
}