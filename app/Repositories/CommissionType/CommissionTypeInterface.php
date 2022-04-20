<?php
namespace App\Repositories\CommissionType;
use App\Repositories\Crud\CrudInterface;

interface CommissionTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}