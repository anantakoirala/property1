<?php 
namespace App\Repositories\AdvertisementObjective;
use App\Models\AdvertisementObjective;
use App\Repositories\Crud\CrudRepository;

class AdvertisementObjectiveRepository extends CrudRepository implements AdvertisementObjectiveInterface{
	public function __construct(AdvertisementObjective $ad_obj){
		$this->model = $ad_obj;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}