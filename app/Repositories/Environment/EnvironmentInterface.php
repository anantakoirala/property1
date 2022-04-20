<?php
namespace App\Repositories\Environment;
use App\Repositories\Crud\CrudInterface;

interface EnvironmentInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}