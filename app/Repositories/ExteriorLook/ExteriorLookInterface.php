<?php
namespace App\Repositories\ExteriorLook;
use App\Repositories\Crud\CrudInterface;

interface ExteriorLookInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}