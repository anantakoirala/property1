<?php 
namespace App\Repositories\ClassType;
use App\Models\ClassType;
use App\Repositories\Crud\CrudRepository;

class ClassTypeRepository extends CrudRepository implements ClassTypeInterface{
	public function __construct(ClassType $class_type){
		$this->model = $class_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}