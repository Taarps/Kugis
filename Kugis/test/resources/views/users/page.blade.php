@extends('master')

@section('title', 'Lietotāju tabula')

@section('page_title', 'Lietotāji')

@section('page_subheadering', '')



@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="form-group input-group">
				<input type="text" class="form-control" 
					placeholder="meklēt... (Pēc ievadīšanas nospiediet 'Enter' taustiņu)" 
					id="tFind" 
					onkeypress="fnFindKeyEnter(event)">
				<input type="text" style="display:none;">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
<!-- 			<p>lorem</p> -->
		</div>
	</div>

	<div id="idTable"></div>
@stop


@section('js-scripts')
	<script src="{{ asset('js/users.js') }}"></script>
@stop