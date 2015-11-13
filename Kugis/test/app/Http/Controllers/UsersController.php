<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\User;

class UsersController extends Controller {

	public function tablePage()
	{
		return view('users.page');
	}


	public function table()
	{
		// return var_dump(Input::all());
		$r = Input::get('r');
			if(empty($r))
				$r = 0;

		$f = Input::get('f');
		$rc = Input::get('rc');
			if(empty($rc))
				$rc = 5;

		$arrOrder = Input::get('arrOrder');
		if($arrOrder == null)
			$arrOrder = [1];

		$ordDirect = Input::get('ordDirect');

		$col = 'CONCAT(IFNULL(last_name,""), " ", IFNULL(first_name, ""), " ", IFNULL(email,""))';


		$tableRow = User::table($col, 'LIKE', $f, $rc, $r, $arrOrder, $ordDirect);
		$tableRowCount = User::tableRowCount($col, 'LIKE', $f);

		// Galvenās kolonas kods pēc kuras kārto
		$ordCol = reset($arrOrder);

		// Izmaina kārtošanas virzienu priekš tabulas
		$ordDirect = ($ordDirect == 0) ? 1 : 0;

		$data = [
			'tableRow' => $tableRow,
			'tableRowCount' => $tableRowCount, 
			'rc' => $rc, 
			'r' => $r, 
			'direct' => $ordDirect,
			'ordCol' => $ordCol,
		];

		return view('users.table', $data);
	}



	public function getLastName()
	{
		$id = Input::get('id');

		if((int)$id < 1)
			return response()->json(['status' => 0]);

		$status = User::getLastName($id);

		if($status === 1)
			return response()->json(['status' => $status]);
		else
			return response()->json([
					'status' => $status[0],
					'last_name' => $status['last_name']
					]);
	}


	public function setLastName()
	{
		$id = Input::get('id');
		$val = Input::get('v');

		if((int)$id < 1)
			return response()->json(['status' => 0]); // Nav ID

		$val = trim($val);
		$val = substr($val, 0, 255);

		$status = User::setLastName($id, $val);

		if($status == 1)
			return response()->json(['status' => 1]); // OK
		else
		if($status == 2)
			return response()->json(['status' => 2]); // Error
		else
			return response()->json(['status' => 3]); // Error
	}



	public function getFirstName()
	{
		$id = Input::get('id');

		if((int)$id < 1)
			return response()->json(['status' => 0]);

		$status = User::getFirstName($id);

		if($status === 1)
			return response()->json(['status' => $status]);
		else
			return response()->json([
					'status' => $status[0],
					'first_name' => $status['first_name']
					]);
	}



	public function setFirstName()
	{
		$id = Input::get('id');
		$val = Input::get('v');

		if((int)$id < 1)
			return response()->json(['status' => 0]); // Nav ID

		$val = trim($val);
		$val = substr($val, 0, 255);

		$status = User::setFirstName($id, $val);

		if($status == 1)
			return response()->json(['status' => 1]); // OK
		else
		if($status == 2)
			return response()->json(['status' => 2]); // Error
		else
			return response()->json(['status' => 3]); // Error
	}

}