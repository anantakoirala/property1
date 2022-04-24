<?php
namespace App\Repositories\InteriorLook;
use App\Repositories\Crud\CrudInterface;

interface InteriorLookInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}