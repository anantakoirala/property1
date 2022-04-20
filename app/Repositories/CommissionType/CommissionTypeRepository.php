<?php 
namespace App\Repositories\CommissionType;
use App\Models\CommissionType;
use App\Repositories\Crud\CrudRepository;

class CommissionTypeRepository extends CrudRepository implements CommissionTypeInterface{
	public function __construct(CommissionType $commission_type){
		$this->model = $commission_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}