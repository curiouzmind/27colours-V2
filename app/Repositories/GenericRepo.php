<?php 
namespace App\Repositories;

abstract class GenericRepo implements SongRepoInterface{

	public function getAll()
	{
		return $this->model->all();
	}

	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
}