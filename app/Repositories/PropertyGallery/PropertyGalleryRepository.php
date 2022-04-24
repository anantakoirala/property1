<?php 
namespace App\Repositories\PropertyGallery;
use App\Models\PropertyGallery;
use App\Repositories\Crud\CrudRepository;

class PropertyGalleryRepository extends CrudRepository implements PropertyGalleryInterface{
	public function __construct(PropertyGallery $propertyGallery){
		$this->model = $propertyGallery;
	}
	public function create($data){
		$this->model->create($data);
	}
	public function update($data,$id){
		$this->model->find($id)->update($data);
	}
}