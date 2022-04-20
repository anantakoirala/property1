<?php 
namespace App\Repositories\PropertyType;
use App\Models\PropertyType;
use App\Repositories\Crud\CrudRepository;

class PropertyTypeRepository extends CrudRepository implements PropertyTypeInterface{
	public function __construct(PropertyType $property_type){
		$this->model = $property_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}