@include('pagination.table')

@if (count($tableRow) === 0)
	<div class="row">
		<div class="col-lg-12">
			<div class="alert alert-info alert-dismissable">
				<i class="fa fa-info-circle"></i>  <strong>Nekas nav atrasts!</strong> Pamēģiniet izmainīt meklēšanas parametrus.
			</div>
		</div>
	</div>

@else

	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th class="id_column">#</th>
<?php
	fnTableTHEcho($ordCol, 0, $direct, 'id', 0, 'id_column');
	fnTableTHEcho($ordCol, 1, $direct, 'Uzvārds', 1, '');
	fnTableTHEcho($ordCol, 2, $direct, 'Vārds', 1, '');
	fnTableTHEcho($ordCol, 3, $direct, 'e-pasts', 1, '');
	fnTableTHEcho($ordCol, 4, $direct, 'Status', 1, '');
	fnTableTHEcho($ordCol, 5, $direct, 'Pozīcija', 1, '');
?>				
			</tr>
		</thead>
		<tbody>

			@foreach ($tableRow as $rowIndex => $row)
				<?php
					$a_href = ''; // href="'.asset('persons/'.$row->id).'" target="_blank" '; 
				?>
				<tr>
					<th class="id_column" scope="row">{{ $rowIndex+1 }}</th>
					<td class="id_column"><a <?=$a_href?> >{{ $row->id }}</a></td>
					<td class="pointer" 
						ondblclick="fnEditLastName({{ $row->id }})"
						id="trLastName_{{ $row->id }}">
						<a <?=$a_href?> >{{ $row->last_name }}</a>
					</td>
					<td class="pointer" 
						ondblclick="fnEditFirstName({{ $row->id }})"
						id="trFirstName_{{ $row->id }}">
						<a <?=$a_href?> >{{ $row->first_name }}</a>
					</td>
					<td><a <?=$a_href?> >{{ $row->email }}</a></td>
					<td><a <?=$a_href?> >{{ $row->status }}</a></td>
					<td><a <?=$a_href?> >{{ $row->position }}</a></td>
				</tr>
			@endforeach

		</tbody>
	</table>
@endif