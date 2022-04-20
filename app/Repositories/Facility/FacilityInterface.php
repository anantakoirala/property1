<?php
namespace App\Repositories\Facility;
use App\Repositories\Crud\CrudInterface;

interface FacilityInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}