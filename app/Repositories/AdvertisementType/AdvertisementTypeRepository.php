<?php 
namespace App\Repositories\AdvertisementType;
use App\Models\AdvertisementType;
use App\Repositories\Crud\CrudRepository;

class AdvertisementTypeRepository extends CrudRepository implements AdvertisementTypeInterface{
	public function __construct(AdvertisementType $ad_type){
		$this->model = $ad_type;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}