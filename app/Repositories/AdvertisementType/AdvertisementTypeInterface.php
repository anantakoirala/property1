<?php
namespace App\Repositories\AdvertisementType;
use App\Repositories\Crud\CrudInterface;

interface AdvertisementTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}