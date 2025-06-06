<?php 
namespace App\Repositories\User;
use App\Models\User;
use App\Repositories\Crud\CrudRepository;

class UserRepository extends CrudRepository implements UserInterface{
	public function __construct(User $user){
		$this->model = $user;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}