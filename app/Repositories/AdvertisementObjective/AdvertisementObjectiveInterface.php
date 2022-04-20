<?php
namespace App\Repositories\AdvertisementObjective;
use App\Repositories\Crud\CrudInterface;

interface AdvertisementObjectiveInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}