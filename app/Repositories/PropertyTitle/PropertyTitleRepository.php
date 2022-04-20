<?php 
namespace App\Repositories\PropertyTitle;
use App\Models\PropertyTitle;
use App\Repositories\Crud\CrudRepository;

class PropertyTitleRepository extends CrudRepository implements PropertyTitleInterface{
	public function __construct(PropertyTitle $property_title){
		$this->model = $property_title;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}