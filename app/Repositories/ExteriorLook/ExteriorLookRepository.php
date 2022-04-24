<?php 
namespace App\Repositories\ExteriorLook;
use App\Models\ExteriorLook;
use App\Repositories\Crud\CrudRepository;

class ExteriorLookRepository extends CrudRepository implements ExteriorLookInterface{
	public function __construct(ExteriorLook $exterior_look){
		$this->model = $exterior_look;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}