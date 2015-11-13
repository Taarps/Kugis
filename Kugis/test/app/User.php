<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'position', 'last_name', 'first_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public static function table($col, $met, $val, $take, $skip, $arrOrder, $ordDirect) 
    {
        $skip = $skip * $take - $take;

        $arrOrderColumns = [
            0 => 'id',
            1 => 'last_name',
            2 => 'first_name',
            3 => 'email',
            4 => 'status',
            5 => 'position',
        ];

        $query = User::select('id', 'status', 'position', 'email', 'last_name', 'first_name');

        if(strlen(trim($val)) > 0)
            $query = $query->where(
                                        DB::raw($col), 
                                        $met, 
                                        '%'.str_replace(' ', '%', $val).'%'
                                    );

        $query = $query->take($take)
                        ->skip($skip);

        $arrAlowed = [0,1,2,3,4,5];
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
            return User::where(DB::raw($col), $met, '%'.str_replace(' ', '%', $val).'%')->count();
        else
            return User::count();
    }



	public static function getLastName($id) 
	{
		$query = User::select('last_name')
					->where('id', '=', $id)
					->get();

		if(count($query) == 0) 
			return 1; // Nav ierakstu

		return [ 0 => 2, 'last_name' => $query[0]->last_name ];
	}


	public static function setLastName($id, $val)
	{
		if(strlen($val) == 0)
			$val = NULL;

		$upd = DB::table('users')
			->where('id', $id)
			->update(['last_name' => $val]);

		return 1; 	
	}



	public static function getFirstName($id) 
	{
		$query = User::select('first_name')
					->where('id', '=', $id)
					->get();

		if(count($query) == 0) 
			return 1; // Nav ierakstu

		return [ 0 => 2, 'first_name' => $query[0]->first_name ];
	}


	public static function setFirstName($id, $val)
	{
		if(strlen($val) == 0)
			$val = NULL;

		$upd = DB::table('users')
			->where('id', $id)
			->update(['first_name' => $val]);

		return 1; 	
	}

}