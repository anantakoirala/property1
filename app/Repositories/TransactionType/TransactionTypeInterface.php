<?php
namespace App\Repositories\TransactionType;
use App\Repositories\Crud\CrudInterface;

interface TransactionTypeInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}