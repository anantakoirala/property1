<?php 
namespace App\Repositories\UrgencyType;
use App\Models\UrgencyType;
use App\Repositories\Crud\CrudRepository;

class UrgencyTypeRepository extends CrudRepository implements UrgencyTypeInterface{
	public function __construct(UrgencyType $urgency_type){
		$this->model = $urgency_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}