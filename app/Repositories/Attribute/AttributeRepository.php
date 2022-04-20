<?php 
namespace App\Repositories\Attribute;
use App\Models\Attribute;
use App\Repositories\Crud\CrudRepository;

class AttributeRepository extends CrudRepository implements AttributeInterface{
	public function __construct(Attribute $attribute){
		$this->model = $attribute;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}