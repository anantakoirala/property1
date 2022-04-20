<?php 
namespace App\Repositories\PropertyCategory;
use App\Models\PropertyCategory;
use App\Repositories\Crud\CrudRepository;

class PropertyCategoryRepository extends CrudRepository implements PropertyCategoryInterface{
	public function __construct(PropertyCategory $property_category){
		$this->model = $property_category;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}