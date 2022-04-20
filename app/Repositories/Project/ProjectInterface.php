<?php
namespace App\Repositories\Project;
use App\Repositories\Crud\CrudInterface;

interface ProjectInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}