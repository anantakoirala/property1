<?php 
namespace App\Repositories\Project;
use App\Models\Project;
use App\Repositories\Crud\CrudRepository;

class ProjectRepository extends CrudRepository implements ProjectInterface{
	public function __construct(Project $project){
		$this->model = $project;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}