<?php
namespace App\Repositories\NearByFacility;
use App\Repositories\Crud\CrudInterface;

interface NearByFacilityInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}