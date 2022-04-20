<?php
namespace App\Repositories\ClassType;
use App\Repositories\Crud\CrudInterface;

interface ClassTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}