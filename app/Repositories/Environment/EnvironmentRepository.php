<?php 
namespace App\Repositories\Environment;
use App\Models\Environment;
use App\Repositories\Crud\CrudRepository;

class EnvironmentRepository extends CrudRepository implements EnvironmentInterface{
	public function __construct(Environment $environment){
		$this->model = $environment;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}