<?php
namespace App\Repositories\Attribute;
use App\Repositories\Crud\CrudInterface;

interface AttributeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
	
}