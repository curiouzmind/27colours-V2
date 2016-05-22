<?php
namespace App\Repositories;

interface SongRepoInterface{

	public function getAll();
	public function find($id);
}