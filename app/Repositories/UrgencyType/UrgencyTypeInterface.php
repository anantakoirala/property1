<?php
namespace App\Repositories\UrgencyType;
use App\Repositories\Crud\CrudInterface;

interface UrgencyTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}