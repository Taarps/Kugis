<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use DB;
use Auth;

class PartsCategory extends Model {

	protected $table = 'parts_category';
	protected $guarded = ['id', 'created_at', 'updated_at'];

	public static function table($col, $met, $val, $take, $skip, $arrOrder, $ordDirect) 
	{
		$skip = $skip * $take - $take;

		$arrOrderColumns = [
			0 => 'id',
			1 => 'parts_category',
		];

		$query = PartsCategory::select('id', 'parts_category');

		if(strlen(trim($val)) > 0)
			$query = $query
						->where(
							DB::raw($col), 
							$met, 
							'%'.str_replace(' ', '%', $val).'%'
						);

		$query = $query->take($take)
						->skip($skip);


		$arrAlowed = [0,1];
		$direct = ($ordDirect == 0) ? 'ASC' : 'DESC';
		foreach ($arrOrder AS $item) 
		{
			if(in_array($item, $arrAlowed))
				$query = $query->orderBy($arrOrderColumns[$item], $direct);
		};


		$query = $query->get();

		return $query;
	}


	public static function tableRowCount($col, $met, $val) 
	{
		if(strlen(trim($val)) > 0)
			return PartsCategory::where(DB::raw($col), $met, '%'.str_replace(' ', '%', $val).'%')->count();
		else
			return PartsCategory::count();
	}


	public static function addItem($val)
	{
		if(strlen($val) < 1)
			return 0;

		$query = PartsCategory::select('id')
					->where('parts_category', '=', $val)
					->get();

		if(count($query) > 0)
			return 1;

		if (Auth::user())
			$user_id = Auth::user()->id;
		else
			$user_id = 0;

		$ins = DB::table('parts_category')->insert([
			'parts_category' => $val, 
			'add_user_id' => $user_id,
		]);

		if($ins)
			return 2; // OK
		else
			return 3; // error
	}



	public static function listOfCategory($val) 
	{
		$query = PartsCategory::select('id', 'parts_category');

		if(strlen(trim($val)) > 0)
			$query = $query->where(
					'parts_category', 
					'LIKE', 
					'%'.str_replace(' ', '%', $val).'%'
				);

		$query = $query->orderBy('parts_category')
						->get();

		return $query;		
	}

}