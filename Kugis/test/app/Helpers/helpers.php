<?php

/*

Funkcija priekš tabulu virsrakstu izvadīšanas kurām ir kārtošanas fonkcija izveidota

*/
function fnTableTHEcho($ordCol, $titleNr, $direct, $title, $position, $extraClass)
{
	$direct_echo = '';

	if($ordCol == $titleNr) 
	{
		$direct_echo = $direct;
		$dir = ($direct == 0) ? 'up' : 'down';
		$dir = '<span class="glyphicon glyphicon-arrow-'.$dir.'" aria-hidden="true"></span>';
	} else {
		$direct_echo = 0;
		$dir = '';
	}

	if($position == 0)
		$title = $dir.' '.$title;
	else
		$title = $title.' '.$dir;


	echo 	'<th class="'.$extraClass.' pointer" 
				onclick="fnOrder('.$titleNr.','.$direct_echo
				.')">'.$title.'
			</th>';	
}