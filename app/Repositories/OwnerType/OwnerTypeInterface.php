<?php
namespace App\Repositories\OwnerType;
use App\Repositories\Crud\CrudInterface;

interface OwnerTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}