<?php 
namespace App\Repositories\PropertyStatus;
use App\Models\PropertyStatus;
use App\Repositories\Crud\CrudRepository;

class PropertyStatusRepository extends CrudRepository implements PropertyStatusInterface{
	public function __construct(PropertyStatus $property_status){
		$this->model = $property_status;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}