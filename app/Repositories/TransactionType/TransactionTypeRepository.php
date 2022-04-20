<?php 
namespace App\Repositories\TransactionType;
use App\Models\TransactionType;
use App\Repositories\Crud\CrudRepository;

class TransactionTypeRepository extends CrudRepository implements TransactionTypeInterface{
	public function __construct(TransactionType $transaction_type){
		$this->model = $transaction_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}