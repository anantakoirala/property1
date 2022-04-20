<?php 
namespace App\Repositories\Property;
use App\Models\Property;
use App\Models\PropertyFacility;
use App\Repositories\Crud\CrudRepository;

class PropertyRepository extends CrudRepository implements PropertyInterface{
	public function __construct(Property $property,PropertyFacility $property_facility){
		$this->model = $property;
		$this->property_facility = $property_facility;
	}
	public function create($data){
		$value = $this->model->create($data);
		return $value;
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
	public function savePivotTable($input){
		$this->property_facility->create($input);
	}
	public function deletePivotTable($id){
		$this->property_facility->where('property_id','=',$id)->delete();
	}
}