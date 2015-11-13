<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use DB;
use Auth;

class Parts extends Model {

	protected $table = 'parts';
	protected $guarded = ['id', 'created_at', 'updated_at'];

	public static function table($col, $met, $val, $take, $skip, $arrOrder, $ordDirect) 
	{

		$skip = $skip * $take - $take;

		$arrOrderColumns = [
			0 => 'id',
			1 => 'part',
			2 => 'parts_category',
		];

		$query = Parts::select(
							'parts.id',
							'parts.part',
							'parts_category.parts_category')
					->leftJoin(
								'parts_category', 
								'parts.category_id', 
								'=', 
								'parts_category.id');

		if(strlen(trim($val)) > 0)
			$query = $query->where(
										DB::raw($col), 
										$met, 
										'%'.str_replace(' ', '%', $val).'%'
									);

		$query = $query->take($take)
						->skip($skip);

		$arrAlowed = [0,1,2];
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
			return Parts::where(DB::raw($col), $met, '%'.str_replace(' ', '%', $val).'%')->count();
		else
			return Parts::count();
	}


	public static function addItem($val, $cat_id)
	{
		$query = Parts::select('id')
					->where('part', '=', $val)
					->get();

		if(count($query) > 0)
			return 2;

		if (Auth::user())
			$user_id = Auth::user()->id;
		else
			$user_id = 0;

		$ins = DB::table('parts')->insert([
			'part' => $val, 
			'add_user_id' => $user_id,
			'category_id' => $cat_id,
		]);

		if($ins)
			return 3; // OK
		else
			return 4; // error
	}

}