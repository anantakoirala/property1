<?php
namespace App\Repositories\Propertytitle;
use App\Repositories\Crud\CrudInterface;

interface PropertyTitleInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}