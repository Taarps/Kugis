<?php

$pageTableRowCount = $rc; //$textTRowCount; //Vienā lapā izvadāmo ierakstu skaits
$selectedRowCount = $tableRowCount; //Visu atlasīto ierakstu skaits


// Lai nerādītu lapu navigāciju ja ir tikai viena lapa
$showPagination = ($selectedRowCount <= $pageTableRowCount) ? 1 : 0;


// Nosakām kopējo lapu skaitu  
$paginationPageCount = intval(($selectedRowCount - 1) / $pageTableRowCount) + 1; 

// Nosakām pirmo ierakstu priekš tekošās lapas 
$r = intval($r); 

// Ja $r vērtība ir mazāka par viens vai negatīva  
// pārejam uz pirmo lapu  
// Bet ja pārāk liela, tad uz pēdējo  
if(empty($r) or $r < 0) 
	$r = 1;  

if($r > $paginationPageCount) 
	$r = $paginationPageCount;

$pervpage_start = '';
$pervpage = '';
$page6left = '';
$page5left = '';
$page4left = '';
$page3left = '';
$page2left = '';
$page1left = '';
$page1right = '';
$page2right = '';
$page3right = '';
$page4right = '';
$page5right = '';
$page6right = '';
$nextpage = '';
$nextpage_end = '';


$navStart = '<li><a href="#" onClick="fnLoadTable(';
$navMid = ')" >';


echo '
<div class="pull-left">
	<nav>
		<ul class="pagination pagination-margin-0 pagination-margin-right-space">
			<li><a href="#">sk.: '.$selectedRowCount.'</a></li>
		</ul>
	</nav>	
</div>
<div class="pull-left">
	<nav>
		<ul class="pagination pagination-margin-0">';


// Pārbaudam vai ir vajadzīgas atpakaļ būltas  
// $pervpage_start = $navStart.'1'.$navMid.'«</a></li>'; // <<

if ($r != 1) {
	$pervpage_start = $navStart.'1'.$navMid.'«</a></li>'; // <<
    $pervpage = $navStart.($r - 1).$navMid.'‹</a></li>'; // <
} else {
	$pervpage_start = '<li class="disabled"><a href="#" aria-label="First"><span aria-hidden="true">«</span></a></li>'; // <<
    $pervpage = '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">‹</span></a></li>'; // <
}					   
							   
// Pārbaudām vai ir vajadzīgas būltas uz priekšu  
if ($r != $paginationPageCount) {
	$nextpage = '<li><a href="#" aria-label="Next" onClick="fnLoadTable('.($r + 1).')">›</a></li>'; // >
	$nextpage_end = '<li><a href="#" aria-label="Last" onClick="fnLoadTable('.$paginationPageCount.')"><span aria-hidden="true">»</span></a></li>'; // >>
} else {
	$nextpage = '<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">›</span></a></li>'; // >
	$nextpage_end = '<li class="disabled"><a href="#" aria-label="Last"><span aria-hidden="true">»</span></a></li>'; // >>
}


				
							   
// Atrodam tuvākās divas lapas no abām malām, ja tādas ir  
if($r - 3 > 0) 
	$page3left = $navStart.($r - 3).$navMid.''.($r - 3).'</a></li>';
else
if($r + 4 <= $paginationPageCount)
	$page4right = $navStart.($r + 4).$navMid.''.($r + 4).'</a></li>';


if($r - 2 > 0) 
	$page2left = $navStart.($r - 2).$navMid.''.($r - 2).'</a></li>';
else
if($r + 5 <= $paginationPageCount)
	$page5right = $navStart.($r + 5).$navMid.''.($r + 5).'</a></li>';
 
 
if($r - 1 > 0) 
	$page1left = $navStart.($r - 1).$navMid.''.($r - 1).'</a></li>';
else
if($r + 6 <= $paginationPageCount)
	$page6right = $navStart.($r + 6).$navMid.''.($r + 6).'</a></li>';

  
if($r + 3 <= $paginationPageCount) 
	$page3right = $navStart.($r + 3).$navMid.''.($r + 3).'</a></li>';
else
if($r - 4 > 0)
	$page4left = $navStart.($r - 4).$navMid.''.($r - 4).'</a></li>';

  
if($r + 2 <= $paginationPageCount) 
	$page2right = $navStart.($r + 2).$navMid.''.($r + 2).'</a></li>';
else
if($r - 5 > 0)
	$page5left = $navStart.($r - 5).$navMid.''.($r - 5).'</a></li>';
  
  
if($r + 1 <= $paginationPageCount) 
	$page1right = $navStart.($r + 1).$navMid.''.($r + 1).'</a></li>';
else
if($r - 6 > 0)
	$page6left = $navStart.($r - 6).$navMid.''.($r - 6).'</a></li>';
///////////////////////////////////////////////




	echo $pervpage_start.$pervpage.$page6left.$page5left.$page4left.$page3left.$page2left.$page1left
		.'<li class="active"><a href="#" onClick="fnLoadTable('.$r.')">'.$r.'<span class="sr-only">(current)</span></a></li>'
		.$page1right.$page2right.$page3right.$page4right.$page5right.$page6right.$nextpage.$nextpage_end;

echo '
		</ul>
	</nav>	
</div>';


function pageTableRowCountSelect($v, $rc)
{
	return  ($v == $rc) ? ' selected ' : '';
};


?>

<div class="pull-right">
	<select class="form-control" id="pageTableRowCount" onchange="fnLoadTable(0)">
		<option value="5" <?=pageTableRowCountSelect(5, $pageTableRowCount)?>>5</option>
		<option value="10" <?=pageTableRowCountSelect(10, $pageTableRowCount)?>>10</option>
		<option value="50" <?=pageTableRowCountSelect(50, $pageTableRowCount)?>>50</option>
		<option value="100" <?=pageTableRowCountSelect(100, $pageTableRowCount)?>>100</option>
		<option value="100000" <?=pageTableRowCountSelect(100000, $pageTableRowCount)?>>-viss-</option>

	</select>	
</div>