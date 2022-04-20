<?php 
namespace App\Repositories\NearByFacility;
use App\Models\NearByFacility;
use App\Repositories\Crud\CrudRepository;

class NearByFacilityRepository extends CrudRepository implements NearByFacilityInterface{
	public function __construct(NearByFacility $near_by_facility){
		$this->model = $near_by_facility;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}