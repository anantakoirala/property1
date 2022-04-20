<?php
namespace App\Repositories\Completion;
use App\Repositories\Crud\CrudInterface;

interface CompletionInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}