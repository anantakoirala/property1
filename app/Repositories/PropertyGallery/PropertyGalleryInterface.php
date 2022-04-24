<?php
namespace App\Repositories\PropertyGallery;
use App\Repositories\Crud\CrudInterface;

interface PropertyGalleryInterface extends CrudInterface{
	public function create($data);
	public function update($data,$id);
}