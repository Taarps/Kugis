<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Models\PartsCategory;

class PartsCategoryController extends Controller {

	public function tablePage()
	{
		return view('parts-category.page');
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


		$col = 'parts_category';

		$tableRow = PartsCategory::table($col, 'LIKE', $f, $rc, $r, $arrOrder, $ordDirect);
		$tableRowCount = PartsCategory::tableRowCount($col, 'LIKE', $f);



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

		return view('parts-category.table', $data);
	}


	public function itemPanel()
	{
		return view('parts-category.item-panel');
	}


	public function addItem()
	{
		$f = Input::get('f');

		$f = trim($f);
		$f = substr($f, 0, 255);

		$status = PartsCategory::addItem($f);

		return response()->json(['status' => $status]);
	}


	public function listBox()
	{
		$f = Input::get('f'); // Meklēšanas parametir
		$s = Input::get('s'); // Atzīmētās kat. ID
			
		$listOfCategory = PartsCategory::listOfCategory($f);

		$echoList = '';

		foreach($listOfCategory as $item)
		{
			$class = '';

			if($s == $item->id) 
				$class = 'selected';

			$echoList .= '<div class="item '.$class.'" id="mdCategoryList_i_'.$item->id.'" onclick="fnClickCategoryList('.$item->id.')">'
				.$item->parts_category.'</div>';
		}


		if(strlen($echoList) == 0)
			$echoList = '<div class="item">-- nekas nav atrasts --</div>';

		return $echoList;
	}





}