<?php
namespace App\Repositories\PropertyCategory;
use App\Repositories\Crud\CrudInterface;

interface PropertyCategoryInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}