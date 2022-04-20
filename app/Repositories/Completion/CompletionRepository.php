<?php 
namespace App\Repositories\Completion;
use App\Models\Completion;
use App\Repositories\Crud\CrudRepository;

class CompletionRepository extends CrudRepository implements CompletionInterface{
	public function __construct(Completion $completion){
		$this->model = $completion;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}