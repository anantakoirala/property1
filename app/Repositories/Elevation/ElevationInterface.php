<?php
namespace App\Repositories\Elevation;
use App\Repositories\Crud\CrudInterface;

interface ElevationInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}