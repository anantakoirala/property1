<?php 
namespace App\Repositories\PropertyFacility;
use App\Models\PropertyFacility;
use App\Repositories\Crud\CrudRepository;

class PropertyFacilityRepository extends CrudRepository implements PropertyFacilityInterface{
	public function __construct(PropertyFacility $property_facility){
		$this->model = $property_facility;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}