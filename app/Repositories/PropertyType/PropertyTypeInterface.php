<?php
namespace App\Repositories\PropertyType;
use App\Repositories\Crud\CrudInterface;

interface PropertyTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}