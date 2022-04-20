<?php 
namespace App\Repositories\Purpose;
use App\Repositories\Crud\CrudRepository;
use App\Models\Purpose;

class PurposeRepository extends CrudRepository implements PurposeInterface{
	public function __construct(Purpose $purpose){
		$this->model = $purpose;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}