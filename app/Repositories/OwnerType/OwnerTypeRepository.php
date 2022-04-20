<?php 
namespace App\Repositories\OwnerType;
use App\Models\OwnerType;
use App\Repositories\Crud\CrudRepository;

class OwnerTypeRepository extends CrudRepository implements OwnerTypeInterface{
	public function __construct(OwnerType $owner_type){
		$this->model = $owner_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}