<?php
namespace App\Repositories\PropertyStatus;
use App\Repositories\Crud\CrudInterface;

interface PropertyStatusInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}