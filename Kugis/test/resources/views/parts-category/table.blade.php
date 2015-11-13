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
	fnTableTHEcho($ordCol, 1, $direct, 'Kategorija', 1, '');
?>
				</th>
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
					<td><a <?=$a_href?> >{{ $row->parts_category }}</a></td>
				</tr>
			@endforeach

		</tbody>
	</table>
@endif