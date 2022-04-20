<?php 
namespace App\Repositories\Elevation;
use App\Models\Elevation;
use App\Repositories\Crud\CrudRepository;

class ElevationRepository extends CrudRepository implements ElevationInterface{
	public function __construct(Elevation $elevation){
		$this->model = $elevation;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}