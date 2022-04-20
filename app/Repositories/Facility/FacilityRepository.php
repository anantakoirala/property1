<?php 
namespace App\Repositories\Facility;
use App\Models\Facility;
use App\Repositories\Crud\CrudRepository;

class FacilityRepository extends CrudRepository implements FacilityInterface{
	public function __construct(Facility $facility){
		$this->model = $facility;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}