<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Models\Parts;

class PartsController extends Controller {

	public function tablePage()
	{
		return view('parts.page');
	}


	public function table()
	{
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

		$col = 'part';


		$tableRow = Parts::table($col, 'LIKE', $f, $rc, $r, $arrOrder, $ordDirect);
		$tableRowCount = Parts::tableRowCount($col, 'LIKE', $f);


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

		return view('parts.table', $data);
	}


	public function itemModal()
	{
		return view('parts.modal');
	}


	public function addItem()
	{
		$v = Input::get('v');
		$c = Input::get('c');

		$v = trim($v);

		if(strlen($v) == 0)
			return response()->json(['status' => 0]);

		$v = substr($v, 0, 255);

		if((int)$c < 1)
			return response()->json(['status' => 1]);

		$status = Parts::addItem($v, $c);

		return response()->json(['status' => $status]);
	}

}