<?php 
namespace App\Repositories\Purpose;
use App\Repositories\Crud\CrudInterface;

interface PurposeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}