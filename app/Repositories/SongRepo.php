<?php
namespace App\Repositories;
use App\Song;
use App\Repositories\GenericRepo;

class SongRepo extends GenericRepo{

	/**
	* @var Song
	*/

	protected $model;
	function __construct(Song $model)
	{
		$this->model =$model;
	}
	/*

	public function getAll()
	{
		return Song::all();
	}

	public function find($id)
	{
		return Song::findOrFail($id);
	}
	 */

	public function recentSong($genre)
	{
 		 return Song::where('genre', '=', $genre)->take(5)->orderBy('id','desc')->get();
	}
	
}