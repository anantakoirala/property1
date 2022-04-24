<?php 
namespace App\Repositories\InteriorLook;
use App\Models\InteriorLook;
use App\Repositories\Crud\CrudRepository;

class InteriorLookRepository extends CrudRepository implements InteriorLookInterface{
	public function __construct(InteriorLook $interior_look){
		$this->model = $interior_look;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}