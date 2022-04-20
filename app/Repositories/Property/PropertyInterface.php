<?php
namespace App\Repositories\Property;
use App\Repositories\Crud\CrudInterface;

interface PropertyInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
	public function savePivotTable($input);
	public function deletePivotTable($id);
}