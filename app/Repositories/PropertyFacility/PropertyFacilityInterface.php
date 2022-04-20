<?php
namespace App\Repositories\PropertyFacility;
use App\Repositories\Crud\CrudInterface;

interface PropertyFacilityInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}